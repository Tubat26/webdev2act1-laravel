<?php

namespace Database\Seeders;

use App\Models\Students;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Students::create([
            'name' => 'Test User',
            'age' => 20,
            'gender' => 'male',
            'address' => 'Test Address',
        ]);

        Students::create([
            'name' => 'Test User2',
            'age' => 25,
            'gender' => 'female',
            'address' => 'Test Address2',
        ]);

        Students::create([
            'name' => 'Test User3',
            'age' => 35,
            'gender' => 'female',
            'address' => 'Test Address3',
        ]);
    }
}