<?php

namespace Database\Factories;

use App\Models\StudyClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyClass>
 */
class StudyClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Class 10', 'Class 11', 'Class 12', 'MHT-CET', 'JEE Main']),
            'icon' => 'classes/science.png',
            'status' => true,
        ];
    }
}
