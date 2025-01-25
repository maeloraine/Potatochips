<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'CU_FName' => 'required|string|max:255',
            'CU_LName' => 'required|string|max:255',
            'CU_Birthdate' => 'required|date',
            'CU_Email' => 'required|email|unique:customers,CU_Email|max:255',
            'CU_Password' => 'required|string|min:8|', 
        ]);

        // Create the customer
        $customer = Customer::create([
            'CU_FName' => $validated['CU_FName'],
            'CU_LName' => $validated['CU_LName'],
            'CU_Birthdate' => $validated['CU_Birthdate'],
            'CU_Email' => $validated['CU_Email'],
            'CU_Password' => Hash::make($validated['CU_Password']),
        ]);

        // Log the user in
        auth()->login($customer);
        return redirect()->route('customer.index');
    }
}

