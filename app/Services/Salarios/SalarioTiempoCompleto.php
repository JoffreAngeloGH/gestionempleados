<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

class SalarioTiempoCompleto implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase + 300; // bono fijo
    }
}