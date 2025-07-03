<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalario;

// Clase para calcular salario tiempo completo
class SalarioTiempoCompleto implements CalculadoraSalario
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase + 300; // aplica bono fijo
    }
}