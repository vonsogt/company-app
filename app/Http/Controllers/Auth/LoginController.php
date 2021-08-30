<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        $data = [];
        if (($company_name = $request->company) != null) {
            // Search company name from api
            $response = Http::get(env('API_URL') . '/api/v1/company?name=' . $company_name);
            $body = collect(json_decode($response->body(), true));

            $data['company'] = $body;
            $data['title'] = $body->isEmpty() ? null : $body['name'];
        }

        return view('auth.login', compact('data'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validate the input
        $this->validateLogin($request);

        // Check the employee user from API
        $response = Http::post(env('API_URL', 'http://localhost:8000') . '/api/v2/auth/login-employee', $request->all());
        $res = json_decode($response->body());

        // Return error if unathorized
        if ($error = $res->error ?? false)
            return back()
                ->withInput($request->only('email'))
                ->withErrors($error);

        // Return response and pass token to cookie
        return redirect(route('admin.home'))
            ->with('message', 'Login Success')
            ->withCookie(cookie('token', $res->access_token, $res->expires_in));
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' =>      'required|email',
            'password' =>   'required|string',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function logout(Request $request)
    {
        \JWTAuth::invalidate(\JWTAuth::getToken());

        return response()->redirectTo(route('login'))->withCookie(cookie('token', null));
    }
}
