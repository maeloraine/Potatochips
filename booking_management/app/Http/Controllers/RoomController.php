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
            return redirect()->route('room.index')->with('error', 'Error: ' . $e->getMessage());
        }


        // Debugging statement to inspect the validated data
        // dd($data);

        //$newRoom = Room::create($data);

        //return redirect(route('room.index'))->with('success', 'Room added successfully!');
    }

        public function edit($id)
    {
        // Retrieve the room from the database by ID
        $room = DB::table('rooms')->where('room_id', $id)->first();

        return view('rooms.edit', compact('room')); // Return the edit view with room data
    }

        public function update(Request $request, $id)
    {
        // Validate the form input
        $validated = $request->validate([
            'Room_Number' => 'required',
            'Room_Type' => 'required|in:Cottage,Kubo,Cabin',
            'Room_Capacity' => 'required|min:1',
            'Room_Status' => 'required',
            'Room_Rate' => 'required|decimal:0,2',
            'Room_Description' => 'required'
        ]);

        // Call the stored procedure to update the room
        DB::statement('EXEC dbo.UpdateRoom ?, ?, ?, ?, ?, ?, ?', [
            $id,
            $request->Room_Number,
            $request->Room_Type,
            $request->Room_Capacity,
            $request->Room_Status,
            $request->Room_Rate,
            $request->Room_Description,
        ]);

        // Redirect back with a success message
        return redirect()->route('room.index')->with('success', 'Room updated successfully.');
    }

    
        public function destroy($id)
    {
        // Call the stored procedure to delete the room by ID
         DB::statement('EXEC dbo.DeleteRoom ?', [$id]);

        // Delete the room from the database
        //DB::table('rooms')->where('room_id', $id)->delete();

        // Redirect back with a success message
        return redirect()->route('room.index')->with('success', 'Room deleted successfully.');
    }

    // public function update(Request $request, $id)
    // {
    //     // Validate the input
    //     $request->validate([
    //         'Room_Number' => 'required|string|max:255',
    //         'Room_Type' => 'required|in:Cottage,Kubo,Cabin',
    //         'Room_Status' => 'required|in:Available,Occupied,Reserved',
    //         'Room_Rate' => 'required|numeric',
    //         'Room_Description' => 'nullable|string',
    //     ]);
    
    //     // Find and update the room
    //     DB::table('rooms')
    //         ->where('room_id', $id)
    //         ->update([
    //             'Room_Number' => $request->Room_Number,
    //             'Room_Type' => $request->Room_Type,
    //             'Room_Status' => $request->Room_Status,
    //             'Room_Rate' => $request->Room_Rate,
    //             'Room_Description' => $request->Room_Description,
    //             'updated_at' => now(),
    //         ]);
    
    //     // Redirect with success message
    //     return redirect()->route('room.index')->with('success', 'Room updated successfully.');
    // }


}