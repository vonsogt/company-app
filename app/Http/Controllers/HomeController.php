<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        if (($company_name = $request->company) != null) {
            // Search company name from api
            $response = Http::get('localhost:8000/api/v1/company?name=' . $company_name);
            $body = collect(json_decode($response->body(), true));

            $data['company'] = $body;
            $data['title'] = $body->isEmpty() ? null : $body['name'];
        }

        return view('index', compact('data'));
    }
}
