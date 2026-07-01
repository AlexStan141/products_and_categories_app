<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'min_price' => fake()->numberBetween(10, 1000),
            'max_price' => function($attributes){
                return fake()->numberBetween($attributes['min_price'], 1000);
            }
        ];
    }
}
