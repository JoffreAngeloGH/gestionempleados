<?php

namespace App\Services\Reportes;

use App\Services\Reportes\ReporteInterface;

class XMLReporteService implements ReporteInterface
{
    public function generar(array $empleados)
    {
        // se crea el XML usando un nodo raiz <empleados>
        $xml = new \SimpleXMLElement('<empleados/>');

        // se recorre el array de empleados donde primero se crea un nodo <empleado> y luego nados hijos para cada propiedad
        foreach ($empleados as $emp) {
            $empleado = $xml->addChild('empleado');
            $empleado->addChild('nombre', $emp['nombre']);
            $empleado->addChild('tipo', $emp['tipo']);
            $empleado->addChild('salario_base', $emp['salario_base']);
            $empleado->addChild('salario_final', $emp['salario_final']);
        }

        // ENVÍA el XML directo al navegador sin descargar
        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }
}
