<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProjectDetailController extends Controller
{
    //
    public function index() {
        return view('layouts.project_detail');
    }
}
