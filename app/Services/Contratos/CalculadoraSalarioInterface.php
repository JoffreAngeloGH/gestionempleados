<?php

namespace App\Services\Contratos;

// INTERFAZ que obliga a implementar calcular
interface CalculadoraSalarioInterface
{
     // Todas las clases que implementen esto deben recibir un salarioBase 
    public function calcular(float $salarioBase): float;
}