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
        Schema::create('booking_models', function (Blueprint $table) {
            $table->id();
            $table->string('movie_id');
            $table->string('user_id');
            $table->string('show_date');
            $table->string('show_time');
            $table->string('tickets');
            $table->string('ticket_price');
            $table->string('total_price');
            $table->string('status');
            $table->string('booking_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_models');
    }
};
