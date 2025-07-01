<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

// Clase para calcular salario de contratista
class SalarioContratista implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase - ($salarioBase * 0.10); // aplica descuento de 10%
    }
}