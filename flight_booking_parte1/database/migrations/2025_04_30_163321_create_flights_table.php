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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained('airlines')->onDelete('cascade');
            $table->foreignId('origin_airport_id')->constrained('airports')->onDelete('restrict');
            $table->foreignId('destination_airport_id')->constrained('airports')->onDelete('restrict');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('price',10,2);
            $table->unsignedInteger('available_seats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
