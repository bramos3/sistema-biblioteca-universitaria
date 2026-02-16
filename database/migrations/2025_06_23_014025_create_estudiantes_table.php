<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//Las migraciones se utilizan para definir la estructura de la base de datos desde el codigo, sin necesidad de usar una 
//herramienta grafica como phpMyAdmin

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('codigo', 40)->primary();
            $table->string('apellidos', 70);
            $table->string('nombres', 70);
            $table->string('telefono', 40);
            $table->string('correo', 70);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};