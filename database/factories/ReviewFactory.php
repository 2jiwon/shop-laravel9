<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->numberBetween(1, 20),
            'user_id' => fake()->numberBetween(1, 3),
            'rate' => fake()->numberBetween(1, 5),
            'title' => fake()->realText(10),
            'contents' => fake()->realText(100),
        ];
    }
}
