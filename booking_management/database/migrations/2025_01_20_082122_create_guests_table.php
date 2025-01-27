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
        Schema::create('guests', function (Blueprint $table) {
            $table->id('guest_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthdate');
            $table->enum('gender', ['Male', 'Female', 'Rather Not Say']);
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('specialRequests')->nullable();
            // $table->time(updated_at);
            // $table->time(created_at);
            $table->timestamps(); // Optional: Add timestamps if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
