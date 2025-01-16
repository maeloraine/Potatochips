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
        Schema::create('Booking', function (Blueprint $table) {
            $table->id('Booking_ID'); // Primary Key
            $table->date('CheckInDate');
            $table->date('CheckOutDate');
            $table->time('CheckInTime');
            $table->time('CheckOutTime');
            $table->string('BookingStatus'); 
            $table->unsignedBigInteger('Guest_ID');
            $table->unsignedBigInteger('Room_ID');
            $table->unsignedBigInteger('Customer_UserID');
            $table->timestamps();

            // Foreign keys
            $table->foreign('Guest_ID')->references('Guest_ID')->on('Guest')->onDelete('cascade');
            $table->foreign('Room_ID')->references('Room_ID')->on('Room')->onDelete('cascade');
            $table->foreign('Customer_UserID')->references('Customer_UserID')->on('Customer_User')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Booking');
    }
};
