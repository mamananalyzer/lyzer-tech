<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\User;
use App\Models\User;
use App\Models\Belanja;
use App\Models\Customer;
use App\Models\Product;
use App\Models\HSE_Hazops;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Belanja::factory()->count(10)->create();
    }
}
