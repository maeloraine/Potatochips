<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('Pokemon.Employee.Home.admin-room', ['rooms' => $rooms]);
    }

    public function addRoom(Request $request) {
        // Validate form data
        $validated = $request->validate([
            'Room_Number' => 'required',
            'Room_Type' => 'required|in:Cottage,Kubo,Cabin',
            'Room_Capacity' => 'required|min:1',
            'Room_Status' => 'required',
            'Room_Rate' => 'required|decimal:0,2',
            'Room_Description' => 'required'
        ]);
        try {
            // Call the stored procedure
            DB::statement('EXEC AddRoom ?, ?, ?, ?, ?, ?', [
                $validated['Room_Number'],
                $validated['Room_Type'],
                $validated['Room_Capacity'],
                $validated['Room_Status'],
                $validated['Room_Rate'],
                $validated['Room_Description'],
            ]);

            return redirect()->route('room.index')->with('success', 'Room added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('rooms.index')->with('error', 'Error: ' . $e->getMessage());
        }

        // Debugging statement to inspect the validated data
        // dd($data);

        //$newRoom = Room::create($data);

        //return redirect(route('room.index'))->with('success', 'Room added successfully!');
    }
}