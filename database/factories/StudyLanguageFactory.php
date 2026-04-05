<?php

namespace Database\Factories;

use App\Models\StudyLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyLanguage>
 */
class StudyLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomElement(['English Medium', 'Marathi Medium', 'Semi-English']);
        return [
            'study_class_id' => \App\Models\StudyClass::factory(),
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 100),
            'icon' => 'languages/lang.png',
            'status' => true,
        ];
    }
}
