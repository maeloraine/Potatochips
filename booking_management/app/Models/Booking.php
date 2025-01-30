<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_reference',
        'check_in_date',
        'check_out_date',
        'check_in_time',
        'check_out_time',
        'booking_status',
        'adults',
        'children',
        'guest_id',
        'room_id',
        'invoice_id'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime',
        'total_price',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->booking_reference = 'BK-' . uniqid();
        });
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function bookingRooms()
    {
        return $this->hasMany(BookingRoom::class, 'booking_id');
    }
}