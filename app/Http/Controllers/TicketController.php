<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    /**
     *  get tickets created
     */
    public function getUserTickets(Request $request, TicketRepository $repository)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 10;

        $tickets = $repository->getUserTickets($user->id, $pageSize);

        return TicketResource::collection($tickets);
    }

    /**
     *  get tickets assigned
     */
    public function getAssignedTickets(Request $request, TicketRepository $repository)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $pageSize = $request->page_size ?? 10;

        $tickets = $repository->getAssignedTickets($user->id, $pageSize);

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request, TicketRepository $repository)
    {
        $validatedData = $request->validated();

        $ticket = $repository->create($validatedData);

        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
