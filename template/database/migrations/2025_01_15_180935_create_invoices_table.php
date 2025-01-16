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
        Schema::create('Invoice', function (Blueprint $table) {
            $table->id('Invoice_ID');
            $table->string('Invoice_Number');
            $table->date('Issue_Date');
            $table->decimal('Total_Amount');
            $table->unsignedBigInteger('Booking_ID');
            $table->unsignedBigInteger('Employee_ID');
            $table->timestamps();

            $table->foreign('Booking_ID')->references('Booking_ID')->on('Booking')->onDelete('cascade');
            $table->foreign('Employee_ID')->references('Employee_UserID')->on('Employee_User')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Invoice');
    }
};
