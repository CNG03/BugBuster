<?php

namespace App\Http\Controllers\WebControllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TestManagementController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1); // Lấy số trang hiện tại từ query string, mặc định là trang 1

        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
        ])->get('http://127.0.0.1:7000/api/v1/testtypes', [
            'page' => $page
        ]);

        if ($response->successful()) {
            $entities = $response->json();
            // return $response->json();
            return view('test-management.index', compact('entities'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }
    public function create(Request $request)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->post('http://127.0.0.1:7000/api/v1/users');
        return response()->json($response); // Trả về kết quả dưới dạng JSON
    }

    public function addTestType(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:7000/api/v1/testtypes', [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $currentPage = $request->input('current_page', 1);

        if ($response->successful()) {
            return redirect()->route('testType', ['page' => $currentPage])->with('success', 'Test Type created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create Test Type. The name require unique');
        }
    }

    public function editEntity(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->patch('http://127.0.0.1:7000/api/v1/testtypes/' . $request->input('id'), [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return redirect()->route('testType', ['page' => $request->input('current_page', 1)])->with('success', 'Test Type updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update Test Type.');
        }
    }

    public function deleteEntity(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'),
            'Accept' => 'application/json',
        ])->delete('http://127.0.0.1:7000/api/v1/testtypes/' . $request->input('id'));

        if ($response->successful()) {
            return redirect()->route('testType', ['page' => $request->input('current_page', 1)])->with('success', 'Test Type deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete Test Type.');
        }
    }
}