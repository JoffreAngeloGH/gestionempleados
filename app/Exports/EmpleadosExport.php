<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpleadosExport implements FromCollection
{
    public function __construct(public array $empleados) {}

    public function collection()
    {
        return collect($this->empleados);
    }
}