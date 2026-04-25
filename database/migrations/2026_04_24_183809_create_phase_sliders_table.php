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
        Schema::create('phase_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable(); // e.g. "🏆 Phase 3 starts 1st Feb"
            $table->string('title');
            $table->string('link_text')->nullable();
            $table->string('link_url')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->default('Join Now');
            $table->string('button_url')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phase_sliders');
    }
};
