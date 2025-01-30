<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->string('booking_reference')->unique();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->integer('adults');
            $table->integer('children');
            $table->decimal('total_price', 8, 2);
            $table->enum('booking_status', ['reserved', 'checked_in', 'checked_out']) ->default('reserved'); // Auto-set to "reserved";
            $table->foreignId('guest_id')->constrained('guests', 'guest_id'); // Explicitly reference 'guest_id'
            $table->foreignId('room_id')->constrained('rooms', 'room_id');   // Explicitly reference 'room_id'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};