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
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/testtypes');

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
}