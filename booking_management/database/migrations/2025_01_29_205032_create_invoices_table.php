<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->string('invoice_reference_number')->unique();
            $table->date('issue_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['pending', 'paid']);
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id'); // Explicitly reference 'booking_id'
            $table->timestamps();
        });

        // Add invoice_id to bookings table after invoices table is created
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('invoice_id')->nullable()->constrained('invoices', 'invoice_id'); // Explicitly reference 'invoice_id'
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropColumn('invoice_id');
        });
        Schema::dropIfExists('invoices');
    }
};