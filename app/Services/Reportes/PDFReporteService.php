<?php

namespace App\Services\Reportes;

class PDFReporteService implements ReporteInterface
{
    public function generar(array $empleados)
    {
        // Simulación simple
        foreach ($empleados as $e) {
            echo "Empleado: {$e->nombre}, Final: {$e->salario_final}\n";
        }

        return 'Simulación de reporte PDF completada.';
    }
}
