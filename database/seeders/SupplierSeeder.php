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
            'address' => '133 Supplier Avenue',
            'email' => 'suppone@gmail.com',
            'phone_number' => '555-1234',
        ]);

        Supplier::create([
            'name' => 'Supplier Two',
            'address' => '456 Supplier Avenue',
            'email' => 'supptwo@gmail.com',
            'phone_number' => '555-5678',
        ]);

        for ($i = 0; $i < 5; $i++) {
            Supplier::create([
                'name' => 'Supplier ' . ($i + 1),
                'address' => 'Supplier Address ' . ($i + 1),
                'email' => 'supplier' . ($i + 1) . '@example.com',
                'phone_number' => '555-5' . ($i + 1) . ($i + 1),
            ]);
        }
        // Add more suppliers as needed
    }
}