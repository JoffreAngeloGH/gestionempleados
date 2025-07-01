<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

// Clase para calcular salario medio tiempo
class SalarioMedioTiempo implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase; // no aplica bonificación
    }
}