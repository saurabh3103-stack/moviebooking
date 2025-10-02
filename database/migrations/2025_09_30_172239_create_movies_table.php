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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('total_seats');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('image')->nullable();
            $table->string('show_timings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
