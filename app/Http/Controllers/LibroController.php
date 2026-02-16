<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;

class LibroController extends Controller
{
  
     //Método que muestra la lista de todos los libros registrados.
        public function index()
    {
        // Obtiene todos los libros ordenados por fecha de creación descendente y paginados de 5 en 5.
        $libros = Libro::orderBy('created_at', 'desc')
            ->paginate(5);

        // Retorna la vista 'libro.index' pasando la lista de libros.
        return view('libro.index', compact('libros'));
    }

    //Método que retorna la vista que contiene el formulario para crear un nuevo libro.
    public function create()
    {
        return view('libro.create');
    }

    /**
     * Guarda un nuevo libro en la base de datos.
     */
    public function store(LibroRequest $request)
    {
        // Crea un nuevo registro de libro con todos datos validados del formulario.
        Libro::create($request->all());

        // Crea un mensaje flash para notificar al usuario del éxito.
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Libro creado exitosamente',
            'text' => 'El libro ha sido registrado correctamente.',
        ]);

        // Redirige al listado de libros.
        return redirect()->route('libros.index');
    }

    /**
     * Muestra un libro específico (no implementado).
     */
    public function show(Libro $libro)
    {
        // Este método está definido pero no implementado en este código.
    }

    /**
     * Muestra el formulario para editar un libro existente.
     */
    public function edit(Libro $libro)
    {
        // Retorna la vista con el formulario de edición, pasando el libro a editar.
        return view('libro.edit', compact('libro'));
    }

    /**
     * Actualiza la información de un libro en la base de datos.
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        // Actualiza el libro con los datos del formulario.
        $libro->update($request->all());

        // Muestra mensaje de éxito con SweetAlert.
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Libro actualizado exitosamente',
            'text' => 'El libro ha sido actualizado correctamente.',
        ]);

        // Redirige a la lista de libros.
        return redirect()->route('libros.index');
    }

    /**
     * Elimina un libro de la base de datos.
     */
    public function destroy(Libro $libro)
    {
        // Borra el registro del libro.
        $libro->delete();

        // Muestra mensaje de éxito con SweetAlert.
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Libro eliminado exitosamente',
            'text' => 'El libro ha sido eliminado correctamente.',
        ]);

        // Redirige al listado de libros.
        return redirect()->route('libros.index');
    }
}