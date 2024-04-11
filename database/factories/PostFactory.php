<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'caption' => fake()->paragraph(),
            'post_id' => fake()->numberBetween(2,50),
            'image' => str_replace('{i}', rand(1,100), 'https://picsum.photos/id/{i}/854/480')
        ];
    }
        
}
