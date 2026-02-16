<?php

// Primero importamos todos los controladores que vamos a usar en nuestras rutas:
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UserController;

// Luego definimos todas nuestras rutas:

// La primera ruta es la principal, la que responde al inicio del sitio (‘/’).
// Cuando alguien accede a esa URL, Laravel carga la vista llamada ‘login’.
// Esta ruta tiene como nombre ‘home’, así que si queremos redirigir a esta página desde otra parte del sistema, simplemente usamos route('home').
Route::get('/', function () {
    return view('login');
})->name('home');

// Aquí definimos una ruta tipo POST que sirve para verificar si un correo electrónico ya está registrado.
// Esta ruta se utiliza normalmente en formularios con AJAX, por ejemplo, cuando el usuario escribe su correo y queremos validar en tiempo real.
// Esta solicitud va al método 'verificarEmail' del LoginController.
Route::post('/verificar-email', [LoginController::class, 'verificarEmail'])->name('verificar.email');

// En esta ruta, cuando el usuario visita ‘/registrarse’, Laravel carga la vista del formulario de registro.
// El nombre de esta ruta es ‘registrar’, y también nos sirve para redirigir fácilmente desde otras vistas o controladores.
Route::get('/registrarse', function () {
    return view('registrarse');
})->name('registrar');

// Esta ruta lleva al dashboard principal del sistema, es decir, la vista que se muestra después de iniciar sesión correctamente.
// Se ejecuta el método ‘dash’ del controlador Dashboard, y se le da el nombre ‘dash’.
Route::get('/inicio', [Dashboard::class, 'dash'])->name('dash');

// A partir de aquí usamos ‘Route::resource’ para declarar rutas automáticas según el patrón RESTful:
// Estas rutas incluyen automáticamente: index, create, store, show, edit, update y destroy.

// Primero registramos las rutas para el recurso ‘estudiante’, y todas esas acciones estarán a cargo del controlador estudianteController.
Route::resource('estudiante', estudianteController::class);

// Luego hacemos lo mismo pero para ‘prestamos’. Esto se encarga de toda la gestión de los préstamos de libros, utilizando PrestamoController.
Route::resource('prestamos', PrestamoController::class);

// También registramos las rutas RESTful para ‘libros’, con su respectivo controlador LibroController.
Route::resource('libros', LibroController::class);

// Y aquí registramos rutas para ‘users’, que nos permite gestionar usuarios del sistema desde un panel protegido.
Route::resource('users', UserController::class);

// Finalmente, incluimos las rutas del archivo ‘auth.php’. 
// Ese archivo contiene todas las rutas necesarias para la autenticación: iniciar sesión, cerrar sesión, registrarse, restablecer contraseña, etc.
// Así mantenemos nuestra organización limpia separando las rutas generales de las rutas relacionadas a login y seguridad.
require __DIR__ . '/auth.php';
