<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(){

        Product::create([
            'name' => 'Example Product',
            'quantity' => 50,
            'price' => 19.99,
            'supplierID' => 1,
            'description' => 'This is an example product.',
        ]);
    }
   
}
