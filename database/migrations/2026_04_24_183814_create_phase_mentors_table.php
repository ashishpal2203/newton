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
        Schema::create('phase_mentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_slider_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('title')->nullable(); // e.g. "NEET-UG 2025"
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phase_mentors');
    }
};
