<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Abdias Laurent',
            'email' => 'olaniranlaurent@gmail.com',
            'password' => Hash::make('secret'),
            'about' => "Hi, I’m Abdias Laurent, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).",
            'uid' => 'heyolaniran'
        ]);
    }
}
