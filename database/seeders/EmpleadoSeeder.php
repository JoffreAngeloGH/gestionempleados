<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create(['nombre' => 'Juan Sebastian', 'apellido' => 'Perez Armando', 'tipo' => 'medio_tiempo', 'salario_base' => 1000]);
        Empleado::create(['nombre' => 'Joffre Angelo', 'apellido' => 'Gallardo Lopez', 'tipo' => 'tiempo_completo', 'salario_base' => 2000]);
        Empleado::create(['nombre' => 'Luis Alberto', 'apellido' => 'Cespedes Rodriguez', 'tipo' => 'contratista', 'salario_base' => 2500]);
    }
}
