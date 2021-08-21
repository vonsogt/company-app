<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get token from cookie
        $token = $request->cookie('token');

        // Get user/employee details from API
        $response = Http::withToken($token)->get(env('API_URL', 'localhost:8000') . '/api/v2/employee-profile');
        $data['user'] = json_decode($response->body());

        // Get user/employee's company details
        $response = Http::withToken($token)->get(env('API_URL', 'localhost:8000') . '/api/v2/employee-company');
        $data['user_details'] = json_decode($response->body());

        // Set page title
        $data['title'] = 'Dashboard';

        return view('admin.home', compact('data'));
    }
}
