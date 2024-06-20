<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WebTicketController extends Controller
{
    public function allTickets(Request $request, $projectID)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/tickets/created/' . $projectID, [
            'page' => $request->input('page', 1)
        ]);

        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/user/role/' . $projectID);

        if ($response1->successful()) {
            $role = $response1->json();
        } else {
            abort(500, 'Internal Server Error');
        }

        if ($response->successful()) {
            $dashboard = $response->json();
            $paginationLinks = $dashboard['links'];
            $paginationMeta = $dashboard['meta'];
            return view('layouts.tickets_all', compact('dashboard', 'paginationLinks', 'paginationMeta', 'role'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }
    public function createdTickets(Request $request, $projectID)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/tickets/created/' . $projectID, [
            'page' => $request->input('page', 1)
        ]);

        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/user/role/' . $projectID);

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/bugtypes');

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/testtypes');

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/testtypes');

        $response4 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/projectmembers/' . $projectID);

        if ($response1->successful()) {
            $role = $response1->json();
        } else {
            $status = $response1->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }

        if ($response2->successful()) {
            $data2 = $response2->json();
            $bugTypes = $data2['data'];
        } else {
            $status = $response2->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }

        if ($response3->successful()) {
            $data3 = $response3->json();
            $testTypes = $data3['data'];
        } else {
            $status = $response3->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }

        if ($response4->successful()) {
            $data4 = $response4->json();
            $developers = array_filter($data4['data'], function ($member) {
                return $member['role_in_project'] === 'DEVELOPER';
            });
        } else {
            $status = $response3->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }


        if ($response->successful()) {
            $dashboard = $response->json();
            $paginationLinks = $dashboard['links'];
            $paginationMeta = $dashboard['meta'];
            return view('layouts.tickets_created', compact('dashboard', 'paginationLinks', 'paginationMeta', 'role', 'bugTypes', 'testTypes', 'developers', 'projectID'));
        } else {
            $status = $response->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }
    }
    public function createTicket(Request $request)
    {
        dd($request);
    }
    public function assignedTickets(Request $request, $projectID)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/tickets/created/' . $projectID, [
            'page' => $request->input('page', 1)
        ]);

        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/user/role/' . $projectID);

        if ($response1->successful()) {
            $role = $response1->json();
        } else {
            abort(500, 'Internal Server Error');
        }

        if ($response->successful()) {
            $dashboard = $response->json();
            $paginationLinks = $dashboard['links'];
            $paginationMeta = $dashboard['meta'];
            return view('layouts.tickets-all', compact('dashboard', 'paginationLinks', 'paginationMeta', 'role'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }


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
