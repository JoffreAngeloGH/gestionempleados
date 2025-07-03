<?php

namespace App\Services\Salarios;

use App\Models\Empleado;
use App\Services\Contratos\CalculadoraSalario;
use App\Services\Salarios\SalarioTiempoCompleto;
use App\Services\Salarios\SalarioMedioTiempo;
use App\Services\Salarios\SalarioContratista;

// FACTORY: decide qué calculadora devolver según el tipo
class SalarioFactory
{
    public static function obtenerCalculadora(Empleado $empleado): CalculadoraSalario
    {
        return match($empleado->tipo) {
            'tiempo_completo' => new SalarioTiempoCompleto(),
            'medio_tiempo'    => new SalarioMedioTiempo(),
            'contratista'     => new SalarioContratista(),
            'freelancer'      => new SalarioFreelancer(), // agregar el nuevo campo para freelancer
            default           => throw new \Exception("Tipo no soportado")
        };
    }
}