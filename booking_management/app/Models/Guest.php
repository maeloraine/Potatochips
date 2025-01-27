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
        'Guest_FName',
        'Guest_LName',
        'Guest_Birthdate',
        'Guest_Gender',
        'Guest_Email',
        'Guest_ContactNumber',
        'Guest_Address',
        'Special_Request'
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'guest_id');
    }
}