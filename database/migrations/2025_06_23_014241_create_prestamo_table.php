<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_estudiante', 40);
            $table->date('fecha_prestamo');
            $table->date('fecha_entrega');
            $table->string('personal', 70);
            $table->string('codigo_libro', 40)->nullable();

            // Claves foráneas
            $table->foreign('codigo_estudiante')->references('codigo')->on('estudiantes')->onDelete('cascade');
            $table->foreign('codigo_libro')->references('codigo')->on('libros')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};

