<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('study_years', function (Blueprint $table) {
            $table->foreignId('study_class_id')->after('id')->nullable()->constrained('study_classes')->cascadeOnDelete();
        });

        // Migrate existing data
        $languages = DB::table('study_languages')->get();
        foreach ($languages as $language) {
            DB::table('study_years')
                ->where('study_language_id', $language->id)
                ->update(['study_class_id' => $language->study_class_id]);
        }
        
        // After migration, we can make it non-nullable if we want, 
        // but let's keep it nullable if there are years without languages (unlikely).
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('study_years', function (Blueprint $table) {
            $table->dropForeign(['study_class_id']);
            $table->dropColumn('study_class_id');
        });
    }
};
