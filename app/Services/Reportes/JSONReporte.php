<?php

namespace App\Services\Reportes;

use App\Services\Reportes\ReporteInterface;
use Illuminate\Support\Facades\Storage; 

// Clase que genera el reporte en JSON
class JSONReporte implements ReporteInterface
{
    public function generar(array $empleados)
    {
        // CONVIERTE empleados a estructura limpia para JSON
        $data = collect($empleados)->map(function ($e) {
            return [
                'nombre' => $e['nombre'],
                'tipo' => $e['tipo'],
                'salario_base' => $e['salario_base'],
                'salario_final' => $e['salario_final'],
            ];
        });

        // GUARDA archivo JSON en disco local (storage/app/reportes)
        Storage::disk('local')->put('reportes/empleados.json', $data->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // DEVUELVE respuesta JSON 
        return response()->json($empleados);
    }
}