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
        Schema::create('Guest', function (Blueprint $table) {
            $table->id('Guest_ID');
            $table->string('Guest_FName', 50);
            $table->string('Guest_MName', 50);
            $table->string('Guest_LName', 25);
            $table->date('Guest_Birthdate');
            $table->string('Guest_Gender');
            $table->string('Guest_Email');
            $table->string('Guest_ContactNumber',11);
            $table->text('Special_Request')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Guest');
    }
};
