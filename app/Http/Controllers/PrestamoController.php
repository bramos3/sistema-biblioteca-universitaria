<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Http\Requests\PrestamoRequest;
use App\Models\Estudiante;
use App\Models\Libro;

class PrestamoController extends Controller
{
    // Método que lista todos los préstamos registrados.
    public function index()
    {
        // Obtiene todos los 'prestamos' de la base de datos.
        $prestamos = Prestamo::all();

        // Retorna la vista 'prestamo.index' pasando la colección de préstamos.
        return view('prestamo.index', compact('prestamos'));
    }

    // Método que muestra el formulario para registrar un nuevo préstamo.
    public function create()
    {
        // Obtiene todos los estudiantes para mostrarlos en el formulario.
        $estudiantes = Estudiante::all();

        // Obtiene todos los libros para mostrarlos en el formulario.
        $libros = Libro::all();

        // Retorna la vista 'prestamo.create' con las listas de estudiantes y libros.
        return view('prestamo.create', compact('estudiantes', 'libros'));
    }

    // Método que muestra el formulario para editar un préstamo existente.
    public function edit(Prestamo $prestamo)
    {
        // Retorna la vista 'prestamo.edit' pasando el préstamo a editar.
        return view('prestamo.edit', compact('prestamo'));
    }

    // Método que guarda un nuevo préstamo en la base de datos.
    public function store(PrestamoRequest $request)
    {
        // Crea un nuevo registro de préstamo con los datos del formulario.
        Prestamo::create([
            'codigo_estudiante' => $request->input('codigo_estudiante'),
            'fecha_prestamo' => $request->input('fecha_prestamo'),
            'fecha_entrega' => $request->input('fecha_entrega'),
            'personal' => $request->input('personal'),
            'codigo_libro' => $request->input('codigo_libro'),
        ]);

        // Redirige a la vista que lista todos los préstamos.
        return redirect()->route('prestamos.index');  
    }

    // Método que actualiza un préstamo existente en la base de datos.
    public function update(PrestamoRequest $request, Prestamo $prestamo)
    {
        // Actualiza el préstamo con todos los datos recibidos y validados.
        $prestamo->update($request->all());

        // Redirige al listado de préstamos.
        return redirect()->route('prestamos.index');
    }

    // Método que elimina un préstamo.
    public function destroy(Prestamo $prestamo)
    {
        // Elimina el préstamo de la base de datos.
        $prestamo->delete();

        // Redirige al listado de préstamos.
        return redirect()->route('prestamos.index');
    }
}