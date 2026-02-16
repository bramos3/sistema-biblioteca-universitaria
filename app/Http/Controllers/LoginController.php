<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
// Método para verificar si un email existe en la tabla 'users'.
    public function verificarEmail(Request $request)
    {
        // Valida que el campo 'email' esté presente, sea un email válido, con longitud entre 5 y 255 caracteres.
        $validated = $request->validate([
            'email' => 'required|email|max:255|min:5',
        ]);


         // Obtiene el valor del campo 'email' desde la solicitud.
        $email = $request->input('email');
        // Verifica si existe un usuario en la tabla 'users' con ese correo electrónico.
        $existe = User::where('email', $email)->exists();
         // Si el email existe, se guarda en la sesión bajo la clave 'correo_estudiante'.
        if ($existe) {
            session(['correo_estudiante' => $email]);
        }
        // Devuelve una respuesta JSON indicando si el email existe o no.
        return response()->json(['existe' => $existe]);
    }
}
