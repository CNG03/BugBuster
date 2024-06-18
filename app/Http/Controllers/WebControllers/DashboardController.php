<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\APIControllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        // $tasks = $this->getUserTasks($user->id);

        return view('layouts.dashboard');
    }

    private function getUserTasks($userId)
    {
        // Giả sử bạn sử dụng Guzzle để gọi API lấy danh sách công việc
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://api-url/tasks', [
            'query' => ['user_id' => $userId]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
