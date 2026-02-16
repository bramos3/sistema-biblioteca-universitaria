<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->string('codigo', 40)->primary();
            $table->string('autor', 40);
            $table->string('editor', 40);
            $table->date('fecha_creacion');
            $table->date('fecha_emision');
            $table->timestamps(); // ← Esto agrega created_at y updated_at automáticamente
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
