<?php

namespace Database\Factories;

use App\Models\StudyYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyYear>
 */
class StudyYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'study_class_id' => \App\Models\StudyClass::factory(),
            'year' => $this->faker->randomElement(['2023-24', '2024-25', '2025-26']),
            'status' => true,
        ];
    }
}
