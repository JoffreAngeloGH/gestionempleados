<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

// Clase para calcular salario tiempo completo
class SalarioTiempoCompleto implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase + 300; // aplica bono fijo
    }
}