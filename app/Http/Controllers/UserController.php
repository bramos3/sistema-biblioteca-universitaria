<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario antes de crear el usuario.
        $request->validate([
            'name' => 'required|string|max:100', // El nombre es obligatorio, texto y máx. 100 caracteres.
            'email' => 'required|email|unique:users,email', // El correo debe ser único en la tabla 'users'.
            'password' => 'required|string|min:8|confirmed', // La contraseña debe tener mínimo 8 caracteres y coincidir con el campo 'password_confirmation'.
        ]);

        // Crea un nuevo usuario con los datos validados recibidos desde el formulario.
        User::create([
           'name' => $request->name,// Asigna el valor del campo 'name' del formulario al campo 'name' de la base de datos.
           'email' => $request->email,// Asigna el valor del campo 'email' del formulario al campo 'email' de la base de datos.
           'password' => Hash::make($request->password), // Encripta la contraseña proporcionada por el usuario utilizando el algoritmo bcrypt mediante Hash::make(),
                                                         // y guarda el resultado en el campo 'password' de la base de datos.
                                                        // Esto garantiza que la contraseña no se almacene en texto plano, protegiendo la seguridad del usuario.
]);

         // Guarda el correo en la sesión bajo la clave 'correo_estudiante'.
        session(['correo_estudiante' => $request->email]);


        // Redirige al usuario al dashboard (vista principal del sistema).
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}