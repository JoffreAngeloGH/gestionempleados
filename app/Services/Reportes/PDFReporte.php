<?php

namespace App\Services\Reportes;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empleado;

// Clase que genera el reporte en PDF
class PDFReporte implements ReporteInterface
{
    public function generar(array $empleados)
    {
        // CARGA una vista blade con los datos para generar PDF
        $pdf = Pdf::loadView('reportes.empleados', ['empleados' => $empleados]);
        // DESCARGA el archivo PDF
        return $pdf->download('reporte_empleados.pdf');
    }
}
