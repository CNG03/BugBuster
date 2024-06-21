<?php

namespace App\Http\Controllers\WebControllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        // Thêm header vào request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('accessToken'), 
        ])->get('http://127.0.0.1:7000/api/v1/users');

        if ($response->successful()) {
            $users = $response->json();
            return view('user-management.index', compact('users'));
        } else {
            abort(500, 'Internal Server Error');
        }
    }


}