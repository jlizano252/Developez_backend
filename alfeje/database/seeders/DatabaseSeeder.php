<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'password' => bcrypt('123'), // Asegúrate de encriptar la contraseña
        ]);
    }
}
