<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Se usa create directamente en lugar de factory() porque en Producción no existe Faker
        User::create([
            'name' => 'CEPEIGE PANAMERICANO',
            'email' => 'admin@cepeige.org',
            'email_verified_at' => now(),
            'password' => bcrypt('PanaMericano2026'),
        ]);
    }
}
