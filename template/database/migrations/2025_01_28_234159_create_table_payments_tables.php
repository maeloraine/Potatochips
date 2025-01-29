<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->string('payment_ref_number')->unique(); //must be system generated and unique
            $table->decimal('total_amount', 8, 2);
            $table->string('description');
            $table->string('currency');
            $table->string('payment_method');
            $table->string('payment_status')->default('Pending');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};