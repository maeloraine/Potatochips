<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index() {
        $guests = Guest::all();
        return view('Pokemon.Employee.Home.admin-guest', ['guests' => $guests]);
        
    }

    // Add guest admin side

    public function addGuest(Request $request) {
        \Log::info('Received guest form submission', $request->all());

        try {
            // Validate request
            $request->validate([
                'lastName' => 'required|string|max:25',
                'firstName' => 'required|string|max:50',
                'gender' => 'required|string',
                'birthdate' => 'required|date',
                'email' => 'required|email|unique:guests,email',
                'phone' => 'required|digits:11',
                'address' => 'nullable|string|max:255',
                'specialRequests' => 'nullable|string|max:100',
            ]);

            // Insert into database
            Guest::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'specialRequests' => $request->specialRequests,
            ]);

            return redirect(route('guest.index'))->with('success', 'Guest added successfully!');
        } catch (\Exception $e) {
            \Log::error('Error adding guest: ' . $e->getMessage());
            return response()->json(['error' => 'Server error. Please try again.'], 500);
        }
            
    }

    public function updateGuest(Request $request) {
        \Log::info('Updating guest information', $request->all());
    
        try {
            // Validate request
            $request->validate([
                'guest_id' => 'required|exists:guests,id',
                'lastName' => 'required|string|max:25',
                'firstName' => 'required|string|max:50',
                'gender' => 'required|string',
                'birthdate' => 'required|date',
                'email' => 'required|email|unique:guests,email,' . $request->guest_id,
                'phone' => 'required|digits:11',
                'address' => 'nullable|string|max:255',
                'specialRequests' => 'nullable|string|max:100',
            ]);
    
            // Find and update the guest
            $guest = Guest::findOrFail($request->guest_id);
            $guest->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'specialRequests' => $request->specialRequests,
            ]);
    
            return redirect(route('guest.index'))->with('success', 'Guest information updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating guest: ' . $e->getMessage());
            return response()->json(['error' => 'Server error. Please try again.'], 500);
        }
    }
    
    
}
