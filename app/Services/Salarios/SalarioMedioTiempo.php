<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalario;

// Clase para calcular salario medio tiempo
class SalarioMedioTiempo implements CalculadoraSalario
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase; // no aplica bonificación
    }
}