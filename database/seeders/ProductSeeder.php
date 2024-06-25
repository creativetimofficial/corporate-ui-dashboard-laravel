<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(){

        $faker = Faker::create();

        Product::create([
            'name' => 'Example Product',
            'quantity' => 50,
            'price' => 19.99,
            'supplier_id' => 1,
            'description' => 'This is an example product.',
            'low_limit' => 10,

        ]);

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => 'Example Product ' . ($i + 1),
                'quantity' => rand(10, 100),
                'price' => rand(10, 100) / 10,
                'supplier_id' => rand(1, 5),
                'description' => 'This is an example product ' . ($i + 1) . '.',
                'low_limit' => rand(5, 20),
            ]);
        }
        
        // Create 10 random products
        // for ($i = 0; $i < 10; $i++) {
        //     Product::create([
        //         'name' => $faker->sentence(2),
        //         'quantity' => $faker->numberBetween(10, 100),
        //         'price' => $faker->randomFloat(2, 10, 100),
        //         'supplier_id' => $faker->numberBetween(1, 5),
        //         'description' => $faker->paragraph(3),
        //         'low_limit' => rand(5, 20),

        //     ]);
        // }
    }
}