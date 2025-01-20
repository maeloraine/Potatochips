<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function index() {
        $guests = Guest::all();
        return view('Pokemon.Employee.Home.admin-guest', ['guests' => $guests]);
        
    }

    public function addGuest(Request $request) {
        $data = $request->validate([
            'Guest_FName' => 'required|max:50',
            'Guest_LName' => 'required|max:25',
            'Guest_Birthdate' => 'required',
            'Guest_Gender' => 'required',
            'Guest_Email' => 'required',
            'Guest_ContactNumber' => 'required',
            'Special_Request' => 'nullable'
        ]);

        $newGuest = Guest::create($data);

            return redirect(route('guest.index'))->with('success', 'Guest added successfully!');
    }
}
