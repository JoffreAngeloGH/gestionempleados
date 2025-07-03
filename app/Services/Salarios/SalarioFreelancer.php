<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalario;

// Clase para calcular el salario de un freelancer
class SalarioFreelancer implements CalculadoraSalario
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase + ($salarioBase * 0.08); // bono
    }
}
