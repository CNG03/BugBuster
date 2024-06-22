<?php

namespace App\Http\Controllers\WebControllers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProjectDetailController extends Controller
{

    //
    public function index(Request $request, $projectID) {


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/projects/' . $projectID);

        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/user/role/'.$projectID);

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/users/not-in/'.$projectID);

        if ($response1->successful()) {
            $role = $response1->json();
        } else {
            $status = $response1->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }

        if ($response2->successful()) {
            $userNotInProject = $response2->json()['data'];
        } else {
            $status = $response1->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
        }

        if ($response->successful()) {
            $project = $response->json()['data'];
            return view('layouts.project_detail', compact('project', 'role', 'userNotInProject'));
        } else {
            abort(500, 'Internal Server Error');
        }

    }

    public function updateRoleProject(Request $request, $projectID) {

        // Lấy tất cả dữ liệu từ request
        $requestData = $request->all();

        // Tạo payload
        $payload = [
            'members' => [
                [
                    'user_id' => $requestData['user_id'],
                    'role_in_project' => $requestData['role_in_project']
                ]
            ]
        ];

        // Gửi yêu cầu PATCH với payload đã tạo
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->patch('http://127.0.0.1:7000/api/v1/projectmembers/' . $projectID, $payload);

        // Kiểm tra phản hồi và xử lý tương ứng
        if ($response->successful()) {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                ->with('success', 'Project members updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update project members.');
        }

    }

    public function removeMemberFromProject(Request $request, $projectID) {
        // Lấy projectMemberID từ request
        $projectMemberID = $request->input('projectMemberID');

        // Xây dựng URL cho yêu cầu DELETE
        $url = 'http://127.0.0.1:7000/api/v1/projectmembers/' . $projectID . '/' . $projectMemberID;

        // Gửi yêu cầu DELETE với token
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->delete($url);

        // Kiểm tra phản hồi và xử lý tương ứng
        if ($response->successful()) {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                ->with('success', 'Project member deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete project member.');
        }
    }

    public function addMemberFromProject(Request $request, $projectID) {
        // Lấy dữ liệu từ request
        $members = $request->input('members');

        // Gửi dữ liệu tới API bên ngoài
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('accessToken'),
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:7000/api/v1/projectmembers/' . $projectID, [
            'members' => $members
        ]);

        // Kiểm tra phản hồi từ API và đưa ra thông báo thích hợp
        if ($response->successful()) {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                             ->with('success', 'Members added successfully!');
        } else {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                             ->with('error', 'Failed to add members.');
        }
    }
    public function closeProject($projectID) {
        // Xử lý logic đóng project
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:7000/api/v1/projects/close/'.$projectID);

        // Kiểm tra phản hồi từ API và đưa ra thông báo thích hợp
        if ($response->successful()) {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                             ->with('success', 'Project closed successfully!');
        } else {
            return redirect()->route('projectDetail', ['projectID' => $projectID])
                             ->with('error', 'Failed to close project. There is an unclosed ticket');
        }
    }
}
