<?php

namespace App\Http\Controllers\WebControllers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
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
        ])->get('http://127.0.0.1:7000/api/v1/project/tickets/' . $projectID, [
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
    public function createTicket(Request $request) {
        // Chuyển đổi định dạng ngày
        $estimatedHours = $request->input('estimated_hours');
        $formattedEstimatedHours = \DateTime::createFromFormat('d/m/Y', $estimatedHours)->format('Y-m-d');

        // Tạo payload để gửi tới API
        $payload = $request->except('illustration');
        $payload['estimated_hours'] = $formattedEstimatedHours;

        // Gửi yêu cầu tới API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('accessToken'),
            'Accept' => 'application/json',
        ])->attach(
            'illustration', file_get_contents($request->file('illustration')->getRealPath()), $request->file('illustration')->getClientOriginalName()
        )->post('http://127.0.0.1:7000/api/v1/tickets', $payload);

        // Kiểm tra mã phản hồi
        if ($response->status() == 201) {
            $ticket = $response->json();
            return redirect()->route('createdTickets',['projectID' => $request->input('project_id')])->with('success', 'Ticket created successfully!');
        } elseif ($response->status() == 422) {
            $errors = $response->json();
            return redirect()->back()->withErrors($errors['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
        }

    }

    public function updateStatus(Request $request) {
        $apiUrl = "http://127.0.0.1:7000/api/v1/tickets/status/".$request->input('ticket_id');

        try {
            // Gửi yêu cầu POST tới API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . session()->get('accessToken'),
            ])->post($apiUrl, [
                'status' => $request->input('status'),
            ]);

            // Kiểm tra xem yêu cầu có thành công hay không
            if ($response->successful()) {
                $responseBody = $response->json();
                return redirect()->back()->with('success', $responseBody['message']);
            } else {
                $responseBody = $response->json();
                $errorMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Failed to update status';
                $errors = isset($responseBody['errors']) ? $responseBody['errors'] : [];

                return redirect()->back()->withErrors($errors)->with('error', $errorMessage);
            }
        } catch (\Exception $e) {
            // Xử lý lỗi
            return redirect()->back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    public function assignedTickets(Request $request, $projectID) {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/tickets/assigned/'.$projectID, [
            'page' => $request->input('page', 1)]);

        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/user/role/'.$projectID);

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/bugtypes');

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/testtypes');

        $response4 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/projectmembers/'.$projectID);

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
            $developers = array_filter($data4['data'], function($member) {
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
            return view('layouts.assigned_tickets', compact('dashboard', 'paginationLinks', 'paginationMeta', 'role', 'bugTypes', 'testTypes','developers', 'projectID'));
        } else {
            $status = $response->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }
    }

    public function ticketDetail($ticketId)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/tickets/'.$ticketId);

        if ($response->successful()) {
            $ticketDetail = $response->json()['data'];
            $ticketDetail['formatted_estimated_hours'] = Carbon::parse($ticketDetail['estimated_hours'])->locale('en')->isoFormat('dddd, D MMMM YYYY');
            return view('layouts.ticket_detail', compact('ticketDetail'));
        } else {
            abort(404, 'Ticket not found');
        }
    }

    public function editTicket(Request $request, $ticketId)
    {
        $page = $request->query('page', 1);
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), // Thay thế API_TOKEN bằng token của bạn
        ])->get('http://127.0.0.1:7000/api/v1/tickets/'.$ticketId);

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/bugtypes');

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/testtypes');

        

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

        if ($response->successful()) {
            $ticket = $response->json()['data'];
            $projectID = $ticket['project_id'];
            return view('layouts.update_ticket', compact('ticket', 'bugTypes', 'testTypes','page'));
        } else {
            abort(404, 'Ticket not found');
        }
    }

    public function updateTicket(Request $request, $ticketID)
    {
        // Chuyển đổi định dạng ngày
        $estimatedHours = $request->input('estimated_hours');
        $formattedEstimatedHours = \DateTime::createFromFormat('d/m/Y', $estimatedHours)->format('Y-m-d');

        // Tạo payload để gửi tới API
        $payload = $request->except('illustration');
        $payload['estimated_hours'] = $formattedEstimatedHours;
        // dd($payload);

        // Gửi yêu cầu tới API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->attach(
            'illustration', file_get_contents($request->file('illustration')->getRealPath()), $request->file('illustration')->getClientOriginalName()
        )->post('http://127.0.0.1:7000/api/v1/tickets/' . $ticketID, $payload);
    
        // Kiểm tra mã phản hồi
        if ($response->status() == 200) {
            // return redirect()->route('createdTickets', ['projectID' => $request->input('project_id')])->with('success', 'Ticket updated successfully!');
            $page = $request->input('page', 1);
            return redirect()->route('createdTickets', ['projectID' => $request->input('project_id'), 'page' => $page])->with('success', 'Ticket updated successfully!');
        } elseif ($response->status() == 422) {
            $errors = $response->json();
            return redirect()->back()->withErrors($errors['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
        }
        
    }
}
