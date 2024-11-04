<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Verifica se já existe um administrador no banco
        if (!User::where('role', 'admin')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@simpac.com',
                'password' => Hash::make('senha123'), // Alterar para uma senha forte
                'role' => 'admin',
            ]);
        }
    }
}
