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
        Schema::create('ad_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ad_client');
            $table->string('ad_slot');
            $table->enum('ad_format', ['auto', 'responsive', 'fixed']);
            $table->boolean('full_width_responsive')->default(true);
            $table->enum('location', AdZoneLocation::getValues());
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['ad_client', 'ad_slot', 'location']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_zones');
    }
};
