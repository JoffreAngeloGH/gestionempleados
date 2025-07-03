<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

// Clase para calcular el salario de un freelancer
class SalarioFreelancer implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase + ($salarioBase * 0.08); // bono
    }
}
