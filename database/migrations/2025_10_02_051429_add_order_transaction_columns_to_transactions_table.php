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
        Schema::table('transcations', function (Blueprint $table) {
            $table->string('order_id');
            $table->string('user_id');
            $table->string('amount');
            $table->string('status');

            $table->string('transaction_id');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('booking_models')->onDelete('cascade');
            $table->dateTime('transaction_date')->after('booking_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transcations', function (Blueprint $table) {
            $table->dropForeign(['booking_id']);
            $table->dropColumn(['order_id', 'transaction_id', 'booking_id', 'transaction_date']);
        });
    }
};
