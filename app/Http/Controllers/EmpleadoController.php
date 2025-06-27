<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Services\Reportes\JSONReporteService;
use App\Services\Salarios\SalarioFactory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpleadoController extends Controller
{
   public function index()
    {

        $empleados = Empleado::all()->map(function ($empleado) {
        $calculadora = SalarioFactory::obtenerCalculadora($empleado);
        $empleado->salario_final = $calculadora->calcular($empleado->salario_base);
        return $empleado;
    });

        

        return Inertia::render('Empleados/Index', [
            'empleados' => $empleados
        ]);
    }

    public function generarReporte()
{
    $empleados = Empleado::all()->map(function ($empleado) {
        $calculadora = SalarioFactory::obtenerCalculadora($empleado);
        $empleado->salario_final = $calculadora->calcular($empleado->salario_base);
        return $empleado;
    })->toArray();

    // Puedes alternar entre JSONReporteService o PDFReporteService
    $reporte = new JSONReporteService();
    $mensaje = $reporte->generar($empleados);

    return response()->json(['mensaje' => $mensaje]);
}
}
