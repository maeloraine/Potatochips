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
        'firstName',
        'lastName',
        'gender',
        'birthdate',
        'email',
        'phone',
        'address',
        'specialRequests',
    ];
    
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'guest_id');
    }
}