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
            $table->id('GuestID');
            $table->string('Guest_FName');
            $table->string('Guest_LName');
            $table->date('Guest_Birthdate');
            $table->enum('Guest_Gender', ['Male', 'Female', 'Rather Not Say']);
            $table->string('Guest_Email');
            $table->string('Guest_ContactNumber');
            $table->text('Special_Request')->nullable();
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
