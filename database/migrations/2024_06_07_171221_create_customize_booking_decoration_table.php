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
        Schema::create('customize_booking_decoration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customize_booking_id')->constrained('customize_bookings')->onDelete('cascade');
            $table->foreignId('decoration_id')->constrained('decorations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customize_booking_decoration');
    }
};
