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
        Schema::create('theaters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manager_name');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theaters');
    }
};
