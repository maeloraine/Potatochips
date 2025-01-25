<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt([
            'email' => $credentials['email'], 
            'password' => $credentials['password']
        ])) {
            // Regenerate session to avoid session fixation attacks
            $request->session()->regenerate();
            
            // Redirect to intended route after login or to a default route
            return redirect()->route('customer.index');
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
      
    }
    // public function showLoginForm()
    // {
    //     return view('auth.customer-login'); // Create this view for the login form
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'CU_Email' => 'required|email',
    //         'CU_Password' => 'required',
    //     ]);

    //     if (Auth::guard('customer')->attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('customer.index'); // Redirect to the customer dashboard
    //     }

    //     return back()->withErrors([
    //         'CU_Email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}