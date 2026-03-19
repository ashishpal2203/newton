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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('banner')->nullable();
            
            // About Section
            $table->string('about_title')->default('About the Program');
            $table->text('about_text')->nullable();
            
            // JSON Repeaters
            $table->json('info_boxes')->nullable();      // [{"label": "Duration", "value": "2 Years"}, ...]
            $table->json('program_details')->nullable(); // [{"title": "JEE Main", "content": "..."}, ...]
            $table->json('highlights')->nullable();      // ["Regular tests", "Expert faculty", ...]
            
            // Home Page Card
            $table->string('home_icon')->nullable();      
            $table->string('home_subtitle')->nullable();  
            $table->string('home_color')->default('blue'); 
            $table->boolean('is_featured')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
