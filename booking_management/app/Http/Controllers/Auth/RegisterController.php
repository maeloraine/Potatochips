<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'CU_FName' => 'required|string|max:255',
            'CU_LName' => 'required|string|max:255',
            'CU_Birthdate' => 'required|date',
            'email' => 'required|email|unique:customers,email|max:255',
            'password' => 'required|string|min:8', 
        ]);

        // Create the customer
        $customer = Customer::create([
            'CU_FName' => $validated['CU_FName'],
            'CU_LName' => $validated['CU_LName'],
            'CU_Birthdate' => $validated['CU_Birthdate'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log the user in
        Auth::guard('customer')->login($customer);
        return redirect()->route('customer.index');
    }
}

