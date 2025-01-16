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
        Schema::create('Room', function (Blueprint $table) {
            $table->id('Room_ID');
            $table->string('Room_Number');
            $table->string('Room_Type');
            $table->integer('Room_Capacity');
            $table->string('Room_Status');
            $table->decimal('Room_Rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Room');
    }
};
