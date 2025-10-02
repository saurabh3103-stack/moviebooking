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
        Schema::table('movies', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('movie_categories')->onDelete('cascade');
            $table->unsignedBigInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            //
        });
    }
};
