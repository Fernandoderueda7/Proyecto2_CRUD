<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Empleado;
use App\Models\Tienda;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
        ->withPersonalTeam()
        ->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            EmpleadoSeeder::class,
        ]);

        Tienda::factory()
        ->create([
            'nombre' => 'Guadalajara',
        ]);
        
        Tienda::factory()
        ->create([
            'nombre' => 'Zapopan',
        ]);

        Tienda::factory()
        ->create([
            'nombre' => 'Tlaquepaque',
        ]);

    }
}
