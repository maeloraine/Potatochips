<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('Pokemon.Employee.Home.admin-room', ['rooms' => $rooms]);
    }

    public function addRoom(Request $request) {
        $data = $request->validate([
            'Room_Number' => 'required',
            'Room_Type' => 'required',
            'Room_Capacity' => 'required|min:0',
            'Room_Status' => 'required',
            'Room_Rate' => 'required|decimal:0,2',
            'Room_Description' => 'required'
        ]);

        // Debugging statement to inspect the validated data
        // dd($data);

        $newRoom = Room::create($data);

        return redirect(route('room.index'))->with('success', 'Room added successfully!');
    }
}