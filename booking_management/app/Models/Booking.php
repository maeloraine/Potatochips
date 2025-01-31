<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Booking extends Model
{
    // Specify the table name if it's not the plural form of the model
    protected $table = 'bookings'; // Optional if the table name is the plural form of the model name

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'booking_id';

    // Define which columns can be mass-assigned
    protected $fillable = [
        'booking_reference', 
        'check_in_date', 
        'check_out_date', 
        //'check_in_time', 
        //'check_out_time', 
        'booking_status', 
        'guest_id', 
        'room_id', 
        'customer_id'
    ];

    // Disable auto-incrementing if you're using a non-numeric primary key
    public $incrementing = false;

    // Set the timestamp columns if not using default created_at and updated_at
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    // Define the relationships with other models
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
    

    // In your Booking model (app/Models/Booking.php)
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->booking_reference = 'BOOK-' . time() . '-' . strtoupper(substr(uniqid(), -6));
        });
    }
    
}
