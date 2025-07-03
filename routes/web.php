<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

// MUESTRA empleados + salarios calculados
Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');

// GENERA reporte JSON
Route::get('/reporte-json', [EmpleadoController::class, 'generarReporte']);

// GENERA reporte PDF
Route::get('/reporte-pdf', [EmpleadoController::class, 'reportePdf']);

// ENVÍA email a empleado por id
Route::get('/notificar-email/{id}', [EmpleadoController::class, 'notificarEmail']);

// ENVÍA sms a empleado por id
Route::get('/notificar-sms/{id}', [EmpleadoController::class, 'notificarSMS']);

// GENERAR reporte Excel
Route::get('/reporte-excel', [EmpleadoController::class, 'reporteExcel']);

//
Route::get('/reporte-xml', [EmpleadoController::class, 'reporteXml']);
