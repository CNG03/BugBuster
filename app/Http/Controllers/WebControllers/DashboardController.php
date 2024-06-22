<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\APIControllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // $tasks = $this->getUserTasks($user->id);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('https://bugbuster.click/api/v1/tickets/dashboard');

        if ($response->successful()) {
            $dashboard = $response->json();
            // Nhóm các tickets theo ngày tạo
            $groupedTickets = [];
            foreach ($dashboard as $projectData) {
                foreach ($projectData['tickets'] as $ticket) {
                    $date = \Carbon\Carbon::parse($ticket['created_at'])->toDateString();
                    $projectId = $projectData['project']['id'];

                    if (!isset($groupedTickets[$projectId])) {
                        $groupedTickets[$projectId] = [
                            'project' => $projectData['project'],
                            'dates' => []
                        ];
                    }

                    if (!isset($groupedTickets[$projectId]['dates'][$date])) {
                        $groupedTickets[$projectId]['dates'][$date] = [];
                    }

                    $groupedTickets[$projectId]['dates'][$date][] = $ticket;
                }
            }
            // dd($groupedTickets[1]);

            return view('layouts.dashboard', compact('groupedTickets'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }
}
