<?php

namespace Database\Factories;

use App\Models\Belanja;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class BelanjaFactory extends Factory
{
    protected $model = Belanja::class;

    public function definition()
    {
        return [
            'jenisBelanja' => $this->faker->randomElement(['1', '2', '3']),
            'keteranganBarang' => $this->faker->sentence,
            'totalBelanja' => $this->faker->randomFloat(2, 10, 1000), // generates a random float between 10 and 1000
            'created_at' => now(),
        ];
    }
}
