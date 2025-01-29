<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $primaryKey = 'guest_id';


    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'email',
        'phone',
        'address',
        'specialRequests',
        'guest_id'
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class, 'guest_id');
    }
}