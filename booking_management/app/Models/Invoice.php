<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'invoice_id';

    protected $fillable = [
        'invoice_reference_number',
        'issue_date',
        'total_amount',
        'payment_status',
        'booking_id'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'total_amount' => 'decimal:2'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $invoice->invoice_reference_number = 'INV-' . uniqid();
        });
    }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'booking_id');
    }
}
