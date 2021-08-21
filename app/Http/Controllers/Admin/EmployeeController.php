<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DataTables;

class EmployeeController extends Controller
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

        if ($request->ajax()) {
            $company = $data['user_details']->company;
            $employees = $data['user_details']->companyEmployee;

            return Datatables::of($employees)
                ->addIndexColumn()
                ->editColumn('full_name', function ($employee) {
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->editColumn('company', function () use ($company) {
                    return $company->name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary" title="Show" href="' .
                        route("admin.employee.show", [$row->id]) .
                        '"><i class="far fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.employees.index', compact('data'));
    }
}
