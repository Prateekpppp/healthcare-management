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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('inventory_id');
            $table->string('booking_date')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('start_time')->nullable(); // hours or mins
            $table->string('end_time')->nullable(); // hours or mins
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
