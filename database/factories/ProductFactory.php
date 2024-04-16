<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'code' => fake()->randomNumber(3, true),
            'status' => 'published',
            'imported_t' => now(),
            'url' => fake()->url(),
            'creator' => fake()->name(),
            'created_t' => now(),
            'last_modified_t' => now(),
            'product_name' => fake()->sentence(2),
            'quantity' => fake()->randomNumber(3, true),
            'brands' => fake()->sentence(2),
            'categories' => fake()->sentence(2),
            'labels' => fake()->sentence(2),
            'cities' => fake()->sentence(2),
            'purchase_places' => fake()->sentence(2),
            'stores' => fake()->sentence(2),
            'ingredients_text' => fake()->sentence(2),
            'traces' => fake()->sentence(2),
            'serving_size' => fake()->sentence(2),
            'serving_quantity' => fake()->randomNumber(3, true),
            'nutriscore_score' => fake()->randomNumber(3, true),
            'nutriscore_grade' => fake()->sentence(2),
            'main_category' => fake()->sentence(2),
            'image_url' => fake()->url(),
        ];
    }
}
