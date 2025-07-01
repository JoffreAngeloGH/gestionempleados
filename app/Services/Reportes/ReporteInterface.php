<?php

namespace App\Services\Reportes;


// INTERFAZ general para todos los servicios de reporte
interface ReporteInterface
{
    // obliga a que toda clase implementadora tenga un método generar
    public function generar(array $empleados);
}