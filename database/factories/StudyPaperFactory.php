<?php

namespace Database\Factories;

use App\Models\StudyPaper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyPaper>
 */
class StudyPaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'study_year_id' => \App\Models\StudyYear::factory(),
            'title' => $this->faker->sentence(4),
            'file_path' => 'study_materials/sample.pdf',
            'status' => true,
        ];
    }
}
