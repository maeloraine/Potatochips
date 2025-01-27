<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id('guest_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthdate');
            $table->string('gender');  // Changed from enum
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('specialRequests')->nullable();
            $table->timestamps();
        });

        // Add CHECK constraint for gender
        DB::statement("ALTER TABLE guests ADD CONSTRAINT CK_guests_gender 
            CHECK (gender IN ('Male', 'Female', 'Rather Not Say'))");
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};