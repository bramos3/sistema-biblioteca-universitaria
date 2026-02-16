<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\EstudianteRequest;
use Symfony\Component\HttpKernel\HttpCache\Esi;

class estudianteController extends Controller
{
      //Método que muestra la lista de todos los estudiantes registrados.
    public function index()
    {
        $estudiante = Estudiante::all(); // Recupera todos los estudiantes de la base de datos.
        return view('estudiante.index', compact('estudiante')); // Pasa los datos a la vista.
    }

   // Método que retorna la vista que contiene el formulario para crear un nuevo estudiante.
    public function create()
    {
    return view('estudiante.create');
    }


    // Método que guarda un nuevo estudiante en la base de datos.
    // Utiliza EstudianteRequest para validar los datos enviados.
    public function store(EstudianteRequest $request)
    {
        // Crea un nuevo estudiante con los datos del formulario.
        Estudiante::create([
            'codigo' => $request->input('codigo'),
            'apellidos' => $request->input('apellidos'),
            'nombres' => $request->input('nombres'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
        ]);

        // Crea un mensaje flash (temporal) que se mostrará después del registro exitoso.
        session()->flash('mensaje', [
            'icon' => 'success',
            'title' => 'Estudiante creado exitosamente',
            'text' => 'El estudiante ha sido registrado correctamente.',
        ]);

        // Redirige al listado de estudiantes (index).
        return redirect()->route('estudiante.index');
    }

    // Método para mostrar el formulario de edición con los datos de un estudiante específico.
    public function edit(Estudiante $estudiante)
    {
        return view('estudiante.edit', compact('estudiante')); // retorna la vista con el estudiante a editar.
    }

    // Método que actualiza los datos de un estudiante existente.
    // que También usa EstudianteRequest para validar los datos.
    public function update(EstudianteRequest $request, Estudiante $estudiante)
    {
        // Actualiza el estudiante con todos los datos recibidos del formulario.
        $estudiante->update($request->all());

        // Redirige al listado de estudiantes actualizado.
        return redirect()->route('estudiante.index');
    }

    // Método para eliminar un estudiante.
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete(); // Elimina el registro de la base de datos.

        // Redirige al listado de estudiantes después de eliminar.
        return redirect()->route('estudiante.index');
    }
}