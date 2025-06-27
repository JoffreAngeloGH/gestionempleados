<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

class SalarioMedioTiempo implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase; // sin bono
    }
}