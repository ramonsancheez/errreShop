<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\State;
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
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'category_id' => function () { return Category::inRandomOrder()->first()->id;},
            'description' => $this->faker->paragraph(2),
            'state_id' => function () { return State::inRandomOrder()->first()->id;},
            'user_id' => 0,
        ];
    }
}
