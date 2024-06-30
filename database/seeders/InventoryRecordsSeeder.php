<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryRecord;
use Faker\Factory as Faker;

class InventoryRecordsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generate dummy data
        for ($i = 0; $i < 50; $i++) {
            InventoryRecord::create([
                'product_id' => $faker->numberBetween(1, 5), // Replace with your product IDs
                'quantity' => $faker->numberBetween(1, 100),
                'usage' => $faker->numberBetween(0, 50),
                'expenses' => $faker->randomFloat(2, 10, 1000),
                'created_at' => $faker->dateTimeBetween('-7 day', 'now'),
                'updated_at' => $faker->dateTimeBetween('-7 day', 'now'),
            ]);
        }
    }
}
