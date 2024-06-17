<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WebTicketController extends Controller
{
    public function edit($ticketId)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/tickets/10');

        if ($response->successful()) {
            $ticket = $response->json()['data'];
            return view('tickets.update', compact('ticket'));
        } else {
            abort(404, 'Ticket not found');
        }
    }

    public function update(Request $request, $ticketId)
    {
        // Nếu có file trong request
        if ($request->hasFile('illustration')) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Session::get('accessToken'),
                'Content-Type' => 'multipart/form-data'
            ])->attach(
                'illustration',
                file_get_contents($request->file('illustration')->getRealPath()),
                $request->file('illustration')->getClientOriginalName()
            )->patch('http://127.0.0.1:7000/api/v1/tickets/' . $ticketId, $request->except('illustration'));
        } else {
            // Không có file trong request
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Session::get('accessToken'),
                'Content-Type' => 'application/json'
            ])->patch('http://127.0.0.1:7000/api/v1/tickets/' . $ticketId, $request->all());
        }

        if ($response->successful()) {
            return redirect()->route('tickets.edit', ['ticket' => $ticketId])->with('success', 'Ticket updated successfully.');
        } else {
            return redirect()->back()->with('error', 'not update được');
        }
    }
}
