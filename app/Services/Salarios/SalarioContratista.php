<?php

namespace App\Services\Salarios;

use App\Services\Contratos\CalculadoraSalarioInterface;

class SalarioContratista implements CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float
    {
        return $salarioBase - ($salarioBase * 0.10); // descuento por comisión
    }
}