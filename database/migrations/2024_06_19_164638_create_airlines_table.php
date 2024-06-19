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
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('airline_city', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Airline::class, 'airline_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\City::class, 'city_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airlines');
        Schema::dropIfExists('airline_city');
    }
};
