<?php

namespace App\Services\Reportes;

interface ReporteInterface
{
    public function generar(array $empleados);
}