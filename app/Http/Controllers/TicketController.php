<?php

namespace App\Http\Controllers;

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
    public function index()
    {
    }
    /**
     *  get tickets created
     */
    public function getUserTickets(Request $request, $projectId)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 10;

        $tickets = $this->repository->getUserTickets($user->id, $projectId, $pageSize);

        return TicketResource::collection($tickets);
    }

    public function getAssignedTickets(Request $request, $projectId)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 10;

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

        $ticket = $this->repository->create($user->id, $validatedData);

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
        $validatedData = $request->validated();

        $this->repository->update($ticket, $validatedData);

        return new JsonResponse([
            'message' => 'update ticket success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return new JsonResponse([
            'message' => 'delete ticket success'
        ]);
    }

    public function test()
    {
        return new JsonResponse([
            'message' => 'test sussess'
        ]);
    }
}
