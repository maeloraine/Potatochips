<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class CustomerRoomController extends Controller
{
    public function index()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('/')->with('error', 'You must be logged in to view this page.');
        }
        $customer = Auth::guard('customer')->user(); // Retrieve the authenticated customer

        // Kunin ang lahat ng available rooms 
        $rooms = Room::where('Room_Status', 'Available')->get();

        // I-pass ang rooms sa view
        return view('Pokemon.Customer.Home.customer-booking', [
            'user' => $customer,
            'rooms' => $rooms,
        ]);
    }
}
