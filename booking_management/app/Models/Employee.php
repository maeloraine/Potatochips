<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable  // Extend Authenticatable
{
    use HasFactory;
    protected $guard = 'employee';

    protected $fillable = [
        'email',
        'password',
        'remember_token',
        'role'  // MUST include role here
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Add these methods
    public function isAdmin(): bool
    {
        return $this->role === 'Admin';
    }

    public function isReceptionist(): bool
    {
        return $this->role === 'Receptionist';
    }
}