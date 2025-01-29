<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index() {
        $guests = Guest::all();
        return view('Pokemon.Employee.Home.admin-guest', ['guests' => $guests]);
        
    }

    // Add guest admin side

    public function addGuest(Request $request) {
        $validated = $request->validate([
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:25',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:guests,email',    
            'phone' => 'required',
            'address' => 'required',
            'specialRequests' => 'nullable|string',
        ]);

        //$newGuest = Guest::create($data);


        try {
            // Call the stored procedure
            DB::statement('EXEC AddGuest ?, ?, ?, ?, ?, ?, ?, ?', [
                $validated['firstName'],
                $validated['lastName'],
                $validated['birthdate'],
                $validated['gender'],
                $validated['email'],
                $validated['phone'],
                $validated['address'],
                $validated['specialRequests'],
            ]);

            return redirect()->route('guest.index')->with('success', 'Room created successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create guest: ' . $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $guest_id)
    {
        // Validate request data
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Rather Not Say',
            'email' => 'required|email|max:255|unique:guests,email,' . $guest_id . ',guest_id',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'specialRequests' => 'nullable|string',
        ]);
    
        try {
            // Call the UpdateGuest stored procedure
            DB::statement('EXEC SP_UpdateGuest ?, ?, ?, ?, ?, ?, ?, ?, ?', [
                $guest_id,
                $validated['firstName'],
                $validated['lastName'],
                $validated['birthdate'],
                $validated['gender'],
                $validated['email'],
                $validated['phone'],
                $validated['address'],
                $validated['specialRequests'],
            ]);
    
            return redirect()->route('guest.index')->with('success', 'Guest updated successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update guest: ' . $e->getMessage()], 500);
        }
    }
    
}
