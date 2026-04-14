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
        Schema::create('announcement_popups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('image_path');
            $table->string('redirect_url')->nullable();
            $table->string('trigger_type')->default('delay'); // delay, scroll
            $table->integer('trigger_value')->default(3); // seconds or pixels
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_popups');
    }
};
