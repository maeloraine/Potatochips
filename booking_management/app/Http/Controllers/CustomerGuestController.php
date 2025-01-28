<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;


class CustomerGuestController extends Controller
{
    /// Add guest details for customer payment and representative
    public function store(Request $request)
    {
        // Ensure the authenticated customer
        $customer = auth('customer')->user();
        if (!$customer) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        $validatedData = $request->validate([
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:25',
            'birthdate' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'specialRequests' => 'nullable'
        ]);
    
        $guest = Guest::create($validatedData);
        return response()->json($guest, 201);
    }


}
