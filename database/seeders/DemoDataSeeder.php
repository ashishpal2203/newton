<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks for truncation
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\Models\Banner::truncate();
        \App\Models\Blog::truncate();
        \App\Models\BlogCategory::truncate();
        \App\Models\Review::truncate();
        \App\Models\Contact::truncate();
        \App\Models\LatestUpdate::truncate();
        \App\Models\StudyClass::truncate();
        \App\Models\StudyLanguage::truncate();
        \App\Models\StudyYear::truncate();
        \App\Models\StudyPaper::truncate();

        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Seed Banners
        \App\Models\Banner::factory(5)->create();

        // 2. Seed Blog Categories and Blogs
        \App\Models\BlogCategory::factory(5)
            ->has(\App\Models\Blog::factory()->count(3))
            ->create();

        // 3. Seed Reviews
        \App\Models\Review::factory(8)->create();

        // 4. Seed Contacts
        \App\Models\Contact::factory(20)->create();

        // 5. Seed Latest Updates
        \App\Models\LatestUpdate::create([
            'title' => 'How to revise Physics in 30 Days?',
            'category' => 'EXAM TIPS',
            'published_date' => '12 Dec 2024',
            'read_time' => '5 min read',
            'status' => true,
            'sort_order' => 1
        ]);

        \App\Models\LatestUpdate::create([
            'title' => 'Top 10 High Weightage Chapters for NEET',
            'category' => 'EXAM TIPS',
            'published_date' => '10 Dec 2024',
            'read_time' => '8 min read',
            'status' => true,
            'sort_order' => 2
        ]);

        // 5. Seed Study Materials hierarchy
        \App\Models\StudyClass::factory(5)
            ->has(
                \App\Models\StudyYear::factory()
                    ->count(4)
                    ->has(
                        \App\Models\StudyPaper::factory()->count(3),
                        'studyPapers'
                    ),
                'studyYears'
            )
            ->create();
    }
}
