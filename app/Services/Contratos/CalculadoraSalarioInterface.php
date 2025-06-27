<?php

namespace App\Services\Contratos;

interface CalculadoraSalarioInterface
{
    public function calcular(float $salarioBase): float;
}