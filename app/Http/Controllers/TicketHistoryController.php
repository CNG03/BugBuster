<?php

namespace App\Http\Controllers;

use App\Models\TicketHistory;
use App\Http\Requests\StoreTicketHistoryRequest;
use App\Http\Requests\UpdateTicketHistoryRequest;

class TicketHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketHistory $ticketHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketHistoryRequest $request, TicketHistory $ticketHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketHistory $ticketHistory)
    {
        //
    }
}
