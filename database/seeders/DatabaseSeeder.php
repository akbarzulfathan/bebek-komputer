<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Part;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin Utama
        User::create([
            'name' => 'Zulfathan Akbar (Admin)',
            'email' => 'admin@bebekkomputer.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Akun User Biasa
        User::create([
            'name' => 'Pelanggan Bebek',
            'email' => 'user@bebekkomputer.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Dummy Data Part Komputer
        Part::create(['nama_produk' => 'Intel Core i7-12700K', 'kategori' => 'Processor', 'harga' => 5500000, 'stok' => 10]);
        Part::create(['nama_produk' => 'NVIDIA RTX 3060 Ti', 'kategori' => 'VGA', 'harga' => 6000000, 'stok' => 5]);
    }
}
