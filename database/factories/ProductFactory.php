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
            'name' => $this->faker->word,
            'function' => $this->faker->word,
            'mode' => $this->faker->word,
            'input' => $this->faker->word,
            'display' => $this->faker->word,
            'output' => $this->faker->word,
            'webbase' => $this->faker->word,
            'comm' => $this->faker->word,
            'image' => $this->faker->word,
            'price' => fake()->numberBetween($min = 100000, $max = 100000000),
            'status' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
