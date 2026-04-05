<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('study_classes', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name')->unique();
        });
        Schema::table('study_languages', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name')->unique();
        });
    }
    public function down(): void {
        Schema::table('study_classes', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('study_languages', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
