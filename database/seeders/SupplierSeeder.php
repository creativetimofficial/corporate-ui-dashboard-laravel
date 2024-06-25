<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        Supplier::create([
            'name' => 'Supplier One',
            'address' => '123 Supplier Street',
            'phone_number' => '555-1234',
        ]);

        Supplier::create([
            'name' => 'Supplier Two',
            'address' => '456 Supplier Avenue',
            'phone_number' => '555-5678',
        ]);

        // Add more suppliers as needed
    }
}