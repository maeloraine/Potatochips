<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';

    protected $fillable = [
        'CU_FName',
        'CU_LName',
        'CU_Birthdate',
        'email',
        'password',
        'remember_token',
    ];

    protected $hidden = [
        'password', // Hides the password when the model is serialized
        'remember_token',
    ];

    protected $casts = [
        'CU_Birthdate' => 'date', // Automatically casts birthdate to a Date object
    ];
    
}
