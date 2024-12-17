<?php

use App\Enum\AdZoneLocation;
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
        Schema::create('ad_zone_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_zone_id')->constrained('ad_zones')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('ad_client');
            $table->string('ad_slot');
            $table->enum('ad_format', ['auto', 'responsive', 'fixed']);
            $table->boolean('full_width_responsive');
            $table->enum('location', AdZoneLocation::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_zone_histories');
    }
};
