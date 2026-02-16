<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// ¿QUÉ SON LOS SEEDERS?
// son un componente utilizado para insertar datos automáticos
// en una base de datos.

// un seeder es una clase PHP
// que contiene un método run().
// Ese método tiene
// instrucciones para insertar
// datos en una tabla de la base
// de datos.

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta el proceso de seed de la base de datos.
     * Este método es llamado cuando se ejecuta:
     * php artisan db:seed
     */
   public function run(): void
{
    // Crear usuario de prueba con tus credenciales
    User::factory()->create([
        'name' => 'Brandhon Ramos',
        'email' => 'ramosestiben03@gmail.com',
        'password' => bcrypt('123456'),
    ]);

    // Crear libros aleatorios
    Libro::factory(10)->create();
}

}