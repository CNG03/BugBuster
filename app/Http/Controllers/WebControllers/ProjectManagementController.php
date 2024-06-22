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

    public function addProject(Request $request)
    {
        // dd($request->all());
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->post('https://bugbuster.click/api/v1/projects', [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Create project success.');
        } else {
            return redirect()->back()->with('error', 'Failed to create project.');
        }
    }
    public function index(Request $request)
    {
        $page = $request->query('page', 1);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('https://bugbuster.click/api/v1/projects', [
            'page' => $page
        ]);

        if ($response->successful()) {
            $projects = $response->json()['data'];
            $pagination = $response->json()['meta'];
            // dd($projects);
            return view('project-management.index', compact('projects', 'pagination'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }


    public function createProject(Request $request)
    {
        // Lấy giá trị của các trường từ form
        $name = $request->input('name');
        $description = $request->input('description');
        // $testers = $request->input('tester-list');

        // Gửi yêu cầu POST đến API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->post('https://bugbuster.click/api/v1/projects', [
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
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->patch("https://bugbuster.click/api/v1/projects/{$id}", [
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
        ])->delete("https://bugbuster.click/api/v1/projects/{$id}");

        if ($response->successful()) {
            // Xử lý response thành công từ API

            return redirect()->back()->with('success', 'Project deleted successfully.');
        } else {
            // Xử lý response lỗi từ API

            return redirect()->back()->with('error', 'Failed to delete project.');
        }
    }
}
