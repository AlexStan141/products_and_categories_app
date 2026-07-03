<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'price' => fake()->numberBetween(10, 1000),
            'description' => fake()->paragraph(3),
            'image' => "https://placehold.co/400x300?text=" . fake()->word(),
            'category_id' => null,
        ];
    }
}
