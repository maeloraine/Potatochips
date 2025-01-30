<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id('guest_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthdate');
            $table->string('gender'); // Values: 'male', 'female'
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('specialRequests')->nullable();
            $table->timestamps();
        });
        
        //CHECK constraint
        // for gender
        DB::statement("ALTER TABLE guests ADD CONSTRAINT CHK_Gender CHECK (gender IN ('Male', 'Female', 'Rather Not Say'))");
        
        // CHECK constraint for phone (must be 11 digits)
        DB::statement("ALTER TABLE guests ADD CONSTRAINT CHK_ContactNumber CHECK (LEN(phone) = 11)");
        
        // UNIQUE constraint for email
        DB::statement("ALTER TABLE guests ADD CONSTRAINT UQ_Email UNIQUE (email)");
        
        // UNIQUE constraint for guest (LastName, FirstName, email)
        DB::statement("ALTER TABLE guests ADD CONSTRAINT UQ_Guest UNIQUE (LastName, FirstName, email)");
        
        // DEFAULT constraint for specialRequests
        DB::statement("ALTER TABLE guests ADD CONSTRAINT DEF_SpecialRequest DEFAULT 'None' FOR specialRequests");
        
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};