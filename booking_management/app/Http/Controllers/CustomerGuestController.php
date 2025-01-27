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
            'Guest_FName' => 'required|max:50',
            'Guest_LName' => 'required|max:25',
            'Guest_Birthdate' => 'required',
            'Guest_Gender' => 'required',
            'Guest_Email' => 'required',
            'Guest_ContactNumber' => 'required',
            'Guest_Address' => 'required|max:255',
            'Special_Request' => 'nullable'
        ]);
    
        $guest = Guest::create($validatedData);
        return response()->json($guest, 201);
    }


}
