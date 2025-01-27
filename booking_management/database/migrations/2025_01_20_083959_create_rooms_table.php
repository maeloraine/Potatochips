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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('Room_Number');
            $table->enum('Room_Type', ['Cottage', 'Kubo', 'Cabin']);
            $table->integer('Room_Capacity');
            $table->enum('Room_Status', ['Available', 'Occupied', 'Reserved']);
            $table->decimal('Room_Rate');
            $table->text('Room_Description');
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
        Schema::dropIfExists('rooms');
    }
};
