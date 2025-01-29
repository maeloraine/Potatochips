<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
        public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('Room_Number');
            $table->string('Room_Type');
            $table->integer('Room_Capacity');
            $table->string('Room_Status');
            $table->decimal('Room_Rate', 10, 2);
            $table->text('Room_Description')->nullable();
            $table->timestamps();
        });

        // CHECK constraints using raw SQL
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CHK_Room_Type CHECK (Room_Type IN ('Cottage', 'Kubo', 'Cabin'))");
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CHK_Room_Status CHECK (Room_Status IN ('available', 'occupied'))");
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CHK_Room_Capacity CHECK (Room_Capacity > 0)");
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT CHK_Room_Rate CHECK (Room_Rate >= 0)");
    }


    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};