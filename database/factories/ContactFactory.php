<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'class' => $this->faker->randomElement(['10th', '11th', '12th', 'JEE', 'NEET']),
            'stream' => $this->faker->randomElement(['Science', 'Commerce', 'Arts']),
            'message' => $this->faker->sentence(),
            'is_read' => $this->faker->boolean(20),
        ];
    }
}
