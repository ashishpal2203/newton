<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'blog_category_id' => \App\Models\BlogCategory::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'image' => 'blogs/dummy.jpg',
            'short_description' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(5, true),
            'author_name' => $this->faker->name(),
            'tags' => implode(',', $this->faker->words(3)),
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => true,
        ];
    }
}
