<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_items', function (Blueprint $table) {
            $table->id('booking_item_id');
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id');
            $table->decimal('price', 8, 2); // Price of the room at the time of booking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_items');
    }
};
