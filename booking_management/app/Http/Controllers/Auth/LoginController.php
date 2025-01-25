<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Customer;

class LoginController extends Controller
{

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'CU_Email' => 'required|email',
            'CU_Password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['CU_Email' => $request->CU_Email, 'CU_Password' => $request->CU_Password], $request->remember)) {
            // If successful, redirect to the intended location
            return redirect()->intended(route('customer.index'));
        }

        // If unsuccessful, redirect back with input and error message
        return redirect()->back()->withInput($request->only('CU_Email', 'remember'))->withErrors([
            'CU_Email' => 'These credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logs the user out

        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect('/'); // Redirects to the home page or login page
    }
}