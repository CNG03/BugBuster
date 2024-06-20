<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Repositories\TicketRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TicketController extends Controller
{
    protected $repository;

    function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     * 
     */

    public function index(Request $request, $projectId)
    {
        $this->authorize('viewAny', [Ticket::class, $projectId]);
        $pageSize = $request->page_size ?? 10;
        $tickets = $this->repository->getTickets($projectId, $pageSize);

        return TicketResource::collection($tickets);
    }

    public function dashboard()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $data = $this->repository->getUserDashboardData($user->id);

        return new JsonResponse($data);
    }
    /**
     *  get tickets created
     */
    public function getUserTickets(Request $request, $projectId)
    {
        $this->authorize('viewAny', [Ticket::class, $projectId]);

        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 2;

        $tickets = $this->repository->getUserTickets($user->id, $projectId, $pageSize);

        return TicketResource::collection($tickets);
    }

    public function getAssignedTickets(Request $request, $projectId)
    {
        $this->authorize('viewAny', [Ticket::class, $projectId]);

        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 2;

        $tickets = $this->repository->getAssignedTickets($user->id, $projectId, $pageSize);

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $validatedData = $request->validated();

        $illustrationPath = null;
        if ($request->hasFile('illustration')) {
            $illustration = $request->file('illustration');
            $illustrationPath = $illustration->store('illustrations', 'public');
        }

        $ticket = $this->repository->create($user->id, $validatedData, $illustrationPath);

        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket = $this->repository->show($ticket);

        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $validatedData = $request->validated();

        if ($request->hasFile('illustration')) {
            $illustration = $request->file('illustration');
            $illustrationPath = $illustration->store('illustrations', 'public');
            $validatedData['illustration'] = $illustrationPath;
        } else {
            $validatedData['illustration'] = $ticket->illustration;
        }

        $this->repository->update($ticket, $validatedData);

        return new JsonResponse([
            'message' => 'update ticket success'
        ]);
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'status' =>  'required|in:Error,Pending,Cancelled,Tested,Closed',
        ]);

        $this->repository->updateStatus($ticket, $validatedData);

        return new JsonResponse([
            'message' => 'update status success'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return new JsonResponse([
            'message' => 'delete ticket success'
        ]);
    }
}
