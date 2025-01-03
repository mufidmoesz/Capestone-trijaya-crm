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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->foreignId('service_id')->nullable()->constrained('services', 'service_id')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('truck_number');
            $table->string('fuel_type');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->foreignId('status')->constrained('statuses', 'status_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
