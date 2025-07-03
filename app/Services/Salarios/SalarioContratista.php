<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalario;

// Clase para calcular salario de contratista
class SalarioContratista implements CalculadoraSalario
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase - ($salarioBase * 0.10); // aplica descuento de 10%
    }
}