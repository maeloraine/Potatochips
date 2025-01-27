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
        $data = $request->validate([
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:25',
            'birthdate' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'specialRequests' => 'nullable'
        ]);

        $newGuest = Guest::create($data);

            return redirect(route('guest.index'))->with('success', 'Guest added successfully!');
    }
    
}
