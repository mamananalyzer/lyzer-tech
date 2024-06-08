<?php

namespace Database\Factories;

use App\Models\HSE_Hazops;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HSE_Hazops>
 */
class HSE_HazopsFactory extends Factory
{
    protected $model = HSE_Hazops::class;

    public function definition()
    {
        return [
            'node' => $this->faker->randomElement(['1', '2', '3']),
            'deviation' => $this->faker->sentence,
            'cause' => $this->faker->sentence,
            'consequence' => $this->faker->sentence,
            'safeguards' => $this->faker->sentence,
            'actions' => $this->faker->sentence,
            'created_at' => now(),
        ];
    }
}
