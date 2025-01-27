<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

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
        return $this->hasMany(Booking::class, 'room_id');
    }
}
