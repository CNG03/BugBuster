<?php

namespace App\Http\Controllers\WebControllers;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;



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
    

    public function createProject(Request $request)
    {
        // Lấy giá trị của các trường từ form
        $name = $request->input('name');
        $description = $request->input('description');
        // $testers = $request->input('tester-list');
    
        // Gửi yêu cầu POST đến API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .Session::get('accessToken'),
        ])->post('http://127.0.0.1:7000/api/v1/projects', [
            'name' => $name,
            'description' => $description,
        ]);
    
        if ($response->successful()) {
            // Xử lý response thành công từ API
    
            return redirect()->back()->with('success', 'Project created successfully.');
        } else {
            // Xử lý response lỗi từ API
            $status = $response->status();
            abort(500, 'Internal Server Error, status code: ' . $status);
            return  redirect()->back()->with('error', 'Failed to create project.');
        }
    }

    public function updateProject(Request $request)
    {
        dd($request->all());

        // Lấy giá trị của các trường từ form
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        // $testers = $request->input('tester-list');
    
        // Gửi yêu cầu POST đến API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .Session::get('accessToken'),
        ])->patch("http://127.0.0.1:7000/api/v1/projects/{$id}", [
                'name' => $name,
            'description' => $description,
        ]);
    
        if ($response->successful()) {
            // Xử lý response thành công từ API
    
            return redirect()->back()->with('success', 'Project created successfully.');
        } else {
            // Xử lý response lỗi từ API
    
            return redirect()->back()->with('error', 'Failed to create project.');
        }
    }
    public function deleteProject(Request $request)
    {
        // Lấy giá trị của các trường từ form
        $id = $request->input('id');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->delete("http://127.0.0.1:7000/api/v1/projects/{$id}");
    
        if ($response->successful()) {
            // Xử lý response thành công từ API
    
            return redirect()->back()->with('success', 'Project deleted successfully.');
        } else {
            // Xử lý response lỗi từ API
    
            return redirect()->back()->with('error', 'Failed to delete project.');
        }

    }
}
