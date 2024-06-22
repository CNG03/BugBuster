<?php

namespace App\Http\Controllers\WebControllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BugManagementController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1); // Lấy thông tin trang từ query string, mặc định là trang 1
        $perPage = $request->query('per_page', 10); // Lấy số lượng bản ghi trên mỗi trang từ query string, mặc định là 10

        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/bugtypes', [
            'page' => $page,
            'per_page' => $perPage
        ]);

        if ($response->successful()) {
            $entities = $response->json();
            return view('bug-management.index', compact('entities'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }

    public function store(Request $request)
    {
        $currentPage = $request->input('current_page', 1);
        $perPage = $request->input('per_page', 10);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:7000/api/v1/bugtypes', [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return redirect()->route('entities', ['page' => $currentPage, 'per_page' => $perPage])->with('success', 'Bug Type created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create Bug Type. The name require unique');
        }
    }

    public function editBugType(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->patch('http://127.0.0.1:7000/api/v1/bugtypes/' . $request->input('id'), [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $currentPage = $request->input('current_page', 1);

        if ($response->successful()) {
            return redirect()->route('entities', ['page' => $currentPage])->with('success', 'Bug Type updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update Bug Type.');
        }
    }

    public function deleteBugType(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->delete('http://127.0.0.1:7000/api/v1/bugtypes/' . $request->input('id'));

        $currentPage = $request->input('current_page', 1);

        if ($response->successful()) {
            return redirect()->route('entities', ['page' => $currentPage])->with('success', 'Bug Type deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete Bug Type.');
        }
    }
}