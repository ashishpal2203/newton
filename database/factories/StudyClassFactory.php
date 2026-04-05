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
        $name = $this->faker->unique()->randomElement(['Class 10', 'Class 11', 'Class 12', 'MHT-CET', 'JEE Main']);
        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'icon' => 'classes/science.png',
            'status' => true,
        ];
    }
}
