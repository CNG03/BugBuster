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
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/bugtypes');

        if ($response->successful()) {
            $entities = $response->json();
            return view('bug-management.index', compact('entities'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }
}