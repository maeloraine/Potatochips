<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'payment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'payment_ref_number',
        'total_amount',
        'description',
        'currency',
        'payment_method',
        'payment_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_amount' => 'decimal:2', // Ensures the total_amount is treated as a decimal
        'created_at' => 'datetime', // Automatically cast `created_at` to a Carbon instance
        'updated_at' => 'datetime', // Automatically cast `updated_at` to a Carbon instance
    ];

    /**
     * The default values for attributes.
     *
     * @var array<string, string>
     */
    protected $attributes = [
        'payment_status' => 'Pending', // Default value for payment_status
    ];
}