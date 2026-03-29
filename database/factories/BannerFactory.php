<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'link' => $this->faker->url(),
            'desktop_image' => 'banners/dummy.jpg',
            'mobile_image' => 'banners/dummy_mobile.jpg',
            'status' => true,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
