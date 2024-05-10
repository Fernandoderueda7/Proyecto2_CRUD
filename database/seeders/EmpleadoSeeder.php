<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('empleados')->insert([
            'nombre' => 'Ricardo Lopez',
            'correo' => 'ricky@alumnos.udg.mx',
            'codigo' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Empleado::factory(14)->create();
    }
}
