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
            'name' => $this->faker->word,
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->numberBetween(0, 1000),
            'state' => $this->faker->randomElement(['bueno', 'nuevo', 'usado']),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
