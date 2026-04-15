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
        $classes = \App\Models\StudyClass::whereNull('slug')->orWhere('slug', '')->get();
        foreach ($classes as $class) {
            $class->slug = \Illuminate\Support\Str::slug($class->name);
            $class->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reverse logic needed for data populating
    }
};
