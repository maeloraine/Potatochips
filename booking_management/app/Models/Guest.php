<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'Guest_FName',
        'Guest_LName',
        'Guest_Birthdate',
        'Guest_Gender',
        'Guest_Email',
        'Guest_ContactNumber',
        'Special_Request'
    ];
}