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
        $user = Auth::user();
        // Kunin ang lahat ng available rooms
        $rooms = Room::where('Room_Status', 'Available')->get();

        // I-pass ang rooms sa view
        return view('Pokemon.Customer.Home.customer-booking', [
            'user' => $user,
            'rooms' => $rooms,
        ]);
    }
}
