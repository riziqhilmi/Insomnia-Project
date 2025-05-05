<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan User model sudah ada

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Menambah admin
        User::create([
            'name' => 'Admin', // Nama Admin
            'email' => 'admin@example.com', // Email Admin
            'password' => bcrypt('password'), // Password Admin (gunakan bcrypt untuk enkripsi)
            'is_admin' => true, // Menandakan ini admin
        ]);
    }
}
