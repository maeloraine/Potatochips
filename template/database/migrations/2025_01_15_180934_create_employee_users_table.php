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
        Schema::create('Employee_User', function (Blueprint $table) {
            $table->id('Employee_UserID');
            $table->string('EMP_FName');
            $table->string('EMP_LName');
            $table->string('EMP_Email');
            $table->string('Password');
            $table->string('EMP_Type');
            $table->string('EMP_Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Employee_User');
    }
};
