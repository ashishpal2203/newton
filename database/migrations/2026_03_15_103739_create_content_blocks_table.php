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
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->index(); // e.g. 'home', 'about', 'contact'
            $table->string('key')->unique(); // e.g. 'home_hero_title'
            $table->longText('value')->nullable();
            $table->enum('type', ['text', 'textarea', 'image', 'html'])->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_blocks');
    }
};
