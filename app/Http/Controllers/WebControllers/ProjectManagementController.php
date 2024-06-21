<?php

// namespace App\Http\Controllers\WebControllers;

// use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Session;

// class ProjectManagementController extends Controller
// {
//     public function index()
//     {
//         $accessToken = Session::get('accessToken');
//         $response = Http::withHeaders([
//             'Authorization' => 'Bearer ' . $accessToken,
//             'Content-Type' => 'application/json'
//         ])->get('http://127.0.0.1:7000/api/v1/projects');

//         if ($response->successful()) {
//             $projects = $response->json();
//             // Xử lý và truyền dữ liệu cho giao diện
//             // return response()->json($projects);
//             view('project-management.index', compact('projects'));
//         } else {
//             return redirect()->back()->with('error', 'Failed to retrieve projects.');
//         }
//     }





namespace App\Http\Controllers\WebControllers;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class ProjectManagementController extends Controller
{
    public function index()
    {
        $projects = Project::with(['projectMembers', 'projectMembers.user'])->get();
        $accessToken = Session::get('accessToken');
        Session::put('accessToken', $accessToken);
        return view('project-management.index', ['projects' => $projects, 'accessToken' => $accessToken]);
        // return response()->json($projects);
    }
    
}
