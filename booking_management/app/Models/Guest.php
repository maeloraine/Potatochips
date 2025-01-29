<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $primaryKey = 'guest_id';


    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'gender',
        'email',
        'phone',
        'address',
        'specialRequests'
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'guest_id');
    }
}