<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $data['title'] = 'Login';

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
        $response = Http::post(env('API_URL') . '/api/v2/auth/login-employee', $request->all());
        $res = json_decode($response->body());

        // Return error if unathorized
        if ($error = $res->error ?? false)
            return back()
                ->withInput($request->only('email'))
                ->withErrors($error);

        return redirect()->route('admin.home')
            ->with('message', 'Login Success')
            ->withCookie($res->access_token);
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
}
