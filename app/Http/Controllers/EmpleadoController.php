<?php

namespace App\Http\Controllers;

// IMPORTA modelo Eloquent Empleado
use App\Models\Empleado;

// IMPORTA servicios SOLID
use App\Services\Notificaciones\EmailNotificadorService;
use App\Services\Notificaciones\SMSNotificadorService;
use App\Services\Notificaciones\WhatsAppNotificadorService;
use App\Services\Reportes\ExcelReporteService;
use App\Services\Reportes\JSONReporteService;
use App\Services\Reportes\PDFReporteService;
use App\Services\Reportes\XMLReporteService;
use App\Services\Salarios\SalarioFactory;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpleadoController extends Controller
{
    public function index()
    {
        // OBTIENE todos los empleados
        $empleados = Empleado::all()->map(function ($empleado) {
            // USA factory para obtener la calculadora adecuada según tipo
            $calculadora = SalarioFactory::obtenerCalculadora($empleado);
            // CALCULA salario final y se lo asigna al objeto
            $empleado->salario_final = $calculadora->calcular($empleado->salario_base);
            return $empleado;
        });


        // ENVÍA los datos a la vista Vue (Inertia)
        return Inertia::render('Empleados/Index', [
            'empleados' => $empleados
        ]);
    }

    // GENERA REPORTE EN JSON 
    public function generarReporte()
    {
        // OBTIENE empleados + calcula salario final
        $empleados = Empleado::all()->map(function ($empleado) {
            $calculadora = SalarioFactory::obtenerCalculadora($empleado);
            $empleado->salario_final = $calculadora->calcular($empleado->salario_base);
            return $empleado;
        })->toArray();

        // CREA instancia del servicio para JSON
        $reporte = new JSONReporteService();
        // GENERA el archivo (o string) del reporte
        $mensaje = $reporte->generar($empleados);
        // DEVUELVE respuesta JSON al cliente
        return response()->json(['mensaje' => $mensaje]);
    }


    // GENERA REPORTE EN PDF
    public function reportePdf()
    {
        $empleados = Empleado::all()->map(function ($empleado) {
            $calculadora = SalarioFactory::obtenerCalculadora($empleado);
            return [
                'nombre' => $empleado->nombre,
                'tipo' => $empleado->tipo,
                'salario_base' => $empleado->salario_base,
                'salario_final' => $calculadora->calcular($empleado->salario_base),
            ];
        })->toArray();
        // CREA instancia del servicio para PDF
        $pdfService = new PDFReporteService();
        // GENERA el PDF
        return $pdfService->generar($empleados);
    }

    public function reporteExcel()
    {
        $empleados = Empleado::all()->map(function ($empleado) {
            $calculadora = SalarioFactory::obtenerCalculadora($empleado);
            return [
                'nombre' => $empleado->nombre,
                'tipo' => $empleado->tipo,
                'salario_base' => $empleado->salario_base,
                'salario_final' => $calculadora->calcular($empleado->salario_base),
            ];
        })->toArray();

        $excelService = new ExcelReporteService();
        return $excelService->generar($empleados);
    }


    // NOTIFICA POR EMAIL A EMPLEADO ESPECÍFICO
    public function notificarEmail($id)
    {
        $empleado = Empleado::findOrFail($id);
        $notificador = new EmailNotificadorService();
        $mensaje = $notificador->enviar($empleado->nombre);

        echo $mensaje; // muestra el mensaje en pantalla
    }

    // NOTIFICA POR SMS A EMPLEADO ESPECÍFICO
    public function notificarSMS($id)
    {
        $empleado = Empleado::findOrFail($id);
        $notificador = new SMSNotificadorService(); //WhatsAppNotificadorService();
        $mensaje = $notificador->enviar($empleado->nombre);

        echo $mensaje;
    }


    public function reporteXml()
    {
        $empleados = Empleado::all()->map(function ($empleado) {
            $calculadora = SalarioFactory::obtenerCalculadora($empleado);
            return [
                'nombre' => $empleado->nombre,
                'tipo' => $empleado->tipo,
                'salario_base' => $empleado->salario_base,
                'salario_final' => $calculadora->calcular($empleado->salario_base),
            ];
        })->toArray();

        $xmlService = new XMLReporteService();
        return $xmlService->generar($empleados);
    }
}
