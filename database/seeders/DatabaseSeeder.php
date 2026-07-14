<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kategori dasar yang dipakai untuk membedakan Motor & Mobil
        Kategori::firstOrCreate(['nama_kategori' => 'Motor']);
        Kategori::firstOrCreate(['nama_kategori' => 'Mobil']);

        // Akun admin default untuk login ke /admin
        User::firstOrCreate(
            ['email' => 'admin@rentalku.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $this->call(KendaraanSeeder::class);
    }
}
