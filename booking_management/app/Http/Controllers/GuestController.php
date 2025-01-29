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
        // Validate form data
        $validated = $request->validate([
            'lastName' => 'required|max:25',
            'firstName' => 'required|max:50',
            'gender' => 'required|in:Male,Female,Rather Not Say',
            'birthdate' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'specialRequests' => 'nullable'
        ]);
        try {
            // Call the stored procedure
            DB::statement('EXEC SP_AddGuest ?, ?, ?, ?, ?, ?, ?, ?', [
                $validated['lastName'],
                $validated['firstName'],
                $validated['gender'],
                $validated['birthdate'],
                $validated['email'],
                $validated['phone'],
                $validated['address'],
                $validated['specialRequests'],
            ]);

            return redirect()->route('guest.index')->with('success', 'Guest added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('guest.index')->with('error', 'Error: ' . $e->getMessage());
        }
    
    }

    public function update(Request $request, $id)
    {
        // Validate the form input
        $validated = $request->validate([
            'lastName' => 'required|max:25',
            'firstName' => 'required|max:50',
            'gender' => 'required|in:Male,Female,Rather Not Say',
            'birthdate' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'specialRequests' => 'nullable'
        ]);

        // Call the stored procedure to update the guest
        DB::statement('EXEC SP_UpdateGuest ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $id,
            $request->lastName,
            $request->firstName,
            $request->gender,
            $request->birthdate,
            $request->email,
            $request->phone,
            $request->address,
            $request->specialRequests,
        ]);

        // Redirect back with a success message
        return redirect()->route('guest.index')->with('success', 'Guest updated successfully.');
    }

    public function destroy($id)
    {
        // Call the stored procedure to delete the guest by ID
         DB::statement('EXEC SP_DeleteGuest ?', [$id]);

        // Delete the guest from the database
        //DB::table('guests')->where('guest_id', $id)->delete();

        // Redirect back with a success message
        return redirect()->route('guest.index')->with('success', 'Guest deleted successfully.');
    }
}