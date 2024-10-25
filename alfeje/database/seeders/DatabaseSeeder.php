<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'jenhson',
            'email' => 'jenhson@gmail.com',
            'password' => '123',
        ]);

        Role::create([
            'name' => 'admin',
            'guard_name' => 'api',
            
        ]);
    }
}
