<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Migracion para agregar el tipo 'freelancer' al campo 'tipo' de la tabla 'empleados'
return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up(): void
    {
        DB::statement("ALTER TABLE empleados MODIFY tipo ENUM('tiempo_completo', 'medio_tiempo', 'contratista', 'freelancer')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE empleados MODIFY tipo ENUM('tiempo_completo', 'medio_tiempo', 'contratista')");
    }
};
