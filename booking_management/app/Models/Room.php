<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // protected $table = 'rooms'; // Explicitly set table name if different
    protected $primaryKey = 'room_id';

    protected $fillable = [
        'Room_Number',
        'Room_Type',
        'Room_Capacity',
        'Room_Status',
        'Room_Rate',
        'Room_Description'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'room_id');
    }
}