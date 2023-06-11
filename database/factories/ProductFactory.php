<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
            'price' => $this->faker->randomFloat(2, 5, 100),
            'category_id' => function () { return Category::inRandomOrder()->first()->id;},
            'description' => $this->faker->paragraph(2),
            'weight' => $this->faker->randomFloat(2, 0.1, 15),
            'points' => $this->faker->numberBetween(1, 10),
            'state_id' => function () { return State::inRandomOrder()->first()->id;},
            'user_id' => 0,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $categoryId = $product->category->id;
            $randomNumber = random_int(1, 5);
            $imageUrl = "/img/categories/{$categoryId}/{$randomNumber}.jpg";
            $product->image_url = $imageUrl;

            if ($product->weight <= 2) {
                $product->points = rand(1, 2);
            } elseif ($product->weight <= 5) {
                $product->points = rand(3, 5);
            } elseif ($product->weight < 10) {
                $product->points = rand(6, 8);
            } else {
                $product->points = rand(9, 10);
            }
            
            $product->save();
        });
    }
}
