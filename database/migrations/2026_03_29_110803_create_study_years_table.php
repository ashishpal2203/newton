<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('study_years', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_language_id')->constrained('study_languages')->cascadeOnDelete();
            $table->string('year');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('study_years'); }
};