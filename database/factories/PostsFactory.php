<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->words(3, true);
        $body = $this->faker->paragraphs(5);

        return [
            'title' => $title,
            'slug' => preg_replace('/\s+/', '-', $title),
            'body' => '<p>' . implode('<p></p>', $body) . '</p>',
            'excerpt' => $body[0],
            'category_id' => rand(1,3),
            'author_id' => rand(1,5)
        ];
    }
}
