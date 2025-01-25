<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'CU_FName',
        'CU_LName',
        'CU_Birthdate',
        'CU_Email',
        'CU_Password',
        'remember_token',
    ];

    protected $hidden = [
        'CU_Password', // Hides the password when the model is serialized
        'remember_token',
    ];

    protected $casts = [
        'CU_Birthdate' => 'date', // Automatically casts birthdate to a Date object
    ];
    
    // Specify the password field for authentication
    public function getAuthPassword()
    {
        return $this->CU_Password;
    }
}
