<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'payments';

    // Define the primary key
    protected $primaryKey = 'payment_id';

    // Define the fields that are mass assignable
    protected $fillable = [
        'payment_ref_number',
        'total_amount',
        'description',
        'currency',
        'payment_method',
        'payment_status',
    ];

    // Define default values for attributes
    protected $attributes = [
        'payment_status' => 'Pending',
    ];

    // Disable auto-incrementing for the primary key (if needed)
    public $incrementing = true;

    // Enable timestamps (created_at and updated_at columns)
    public $timestamps = true;

    // // Optionally, define constants for payment status
    // public const PAYMENT_STATUS_PENDING = 'Pending';
    // public const PAYMENT_STATUS_PAID = 'Paid';

    // // Optionally, define a method to check if the payment is pending
    // public function isPending(): bool
    // {
    //     return $this->payment_status === self::PAYMENT_STATUS_PENDING;
    // }

    // // Optionally, define a method to check if the payment is paid
    // public function isPaid(): bool
    // {
    //     return $this->payment_status === self::PAYMENT_STATUS_PAID;
    // }
}