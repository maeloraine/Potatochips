<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests'; // Ensure this matches your table name

    protected $primaryKey = 'guest_id'; // Specify the primary key column

    public $incrementing = true; // Ensure IDs auto-increment

    protected $fillable = [
        'email', 'first_name', 'last_name', 'gender', 'birthdate',
        'phone', 'address', 'special_requests',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'guest_id');
    }
}