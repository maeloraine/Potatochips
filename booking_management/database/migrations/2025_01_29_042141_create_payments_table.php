<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Auto-incrementing primary key
            $table->string('payment_ref_number')->unique(); // Unique reference number
            $table->decimal('total_amount', 8, 2); // Decimal column for total amount
            $table->string('description'); // Description of the payment
            $table->string('currency'); // Currency (e.g., USD, PHP)
            $table->string('payment_method'); // Payment method (e.g., Credit Card, PayPal)
            $table->string('payment_status')->default('Pending'); // Payment status with default value
            $table->timestamps(); // Adds `created_at` and `updated_at` columns
            $table->unsignedBigInteger('guest_id');

            // Foreign keys
            $table->foreign('guest_id')->references('guest_id')->on('guests')->onDelete('cascade');
        });
    }   

    public function down(): void
    {
        Schema::dropIfExists('payments'); // Drop the table if the migration is rolled back
    }
};