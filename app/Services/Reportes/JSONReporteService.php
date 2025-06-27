<?php

namespace App\Services\Reportes;

use App\Services\Reportes\ReporteInterface;
use Illuminate\Support\Facades\Storage; 

class JSONReporteService implements ReporteInterface
{
    public function generar(array $empleados)
    {
        $data = collect($empleados)->map(function ($e) {
            return [
                'nombre' => $e['nombre'],
                'tipo' => $e['tipo'],
                'salario_base' => $e['salario_base'],
                'salario_final' => $e['salario_final'],
            ];
        });

        Storage::disk('local')->put('reportes/empleados.json', $data->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return response()->json($empleados);
    }
}