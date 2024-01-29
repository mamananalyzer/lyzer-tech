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
            'brand' => $this->faker->company,
            'type' => $this->faker->word,
            'image' => fake()->image(),
            'category' => fake()->name(),
            'spek1' => $this->faker->sentence,
            'spek2' => $this->faker->sentence,
            'spek3' => $this->faker->sentence,
            'price' => fake()->numberBetween($min = 100000, $max = 100000000),
            'diskon' => fake()->numberBetween($min = 10, $max = 50),
            'status' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
