<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'password' => bcrypt('password'), // default password
            'id_no' => $this->faker->unique()->numerify('ID###'),
            'company' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'state' => $this->faker->state,
            'image' => $this->faker->imageUrl(400, 300, 'people'), // assuming the image is a URL
            'role_id' => $this->faker->numberBetween(1, 5), // assuming role_id is between 1 and 5
            'is_active' => $this->faker->boolean,
            'qr' => $this->faker->unique()->md5, // assuming QR is a unique hash
            'join_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'expire_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
