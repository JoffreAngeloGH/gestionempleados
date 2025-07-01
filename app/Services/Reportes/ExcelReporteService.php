<?php

namespace App\Services\Reportes;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmpleadosExport;

class ExcelReporteService implements ReporteInterface
{
    public function generar(array $empleados)
    {
        // Usando Laravel Excel o simulando
        return Excel::download(new EmpleadosExport($empleados), 'reporte_empleados.xlsx');
    }
}
