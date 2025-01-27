<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('Room_Number');
            $table->string('Room_Type');  // Changed from enum
            $table->integer('Room_Capacity');
            $table->string('Room_Status'); // Changed from enum
            $table->decimal('Room_Rate', 10, 2); // Added precision and scale
            $table->text('Room_Description');
            $table->timestamps();
        });

        // Add CHECK constraints for the enum-like behavior
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CK_rooms_type 
            CHECK (Room_Type IN ('Cottage', 'Kubo', 'Cabin'))");
            
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CK_rooms_status 
            CHECK (Room_Status IN ('Available', 'Occupied', 'Reserved'))");
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};