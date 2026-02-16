<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
     /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     * Aquí retorna 'true', lo que significa que cualquier usuario autenticado puede usar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define las reglas de validación que se aplicarán cuando se envíe el formulario.
     * Cada campo tiene condiciones específicas que deben cumplirse para que la solicitud sea válida.
     */
    public function rules(): array
    {
        return [
            // El campo 'codigo' es obligatorio, debe ser texto, máximo 40 caracteres, y único en la tabla 'estudiantes'.
            'codigo'    => 'required|string|max:40|unique:estudiantes,codigo',

            // El campo 'apellidos' es obligatorio, debe ser texto y tener máximo 70 caracteres.
            'apellidos' => 'required|string|max:70',

            // El campo 'nombres' también es obligatorio, de tipo texto, máximo 70 caracteres.
            'nombres'   => 'required|string|max:70',

            // El campo 'telefono' es obligatorio, texto, máximo 40 caracteres.
            'telefono'  => 'required|string|max:40',

            // El campo 'correo' es obligatorio, texto con formato email, máximo 70 caracteres.
            'correo'    => 'required|string|email|max:70',
        ];
    }

    /**
     * Devuelve los mensajes personalizados que se mostrarán si alguna validación falla.
     * Esto mejora la experiencia del usuario mostrando errores más claros y específicos.
     */
    public function messages(): array
    {
        return [
            // Mensajes para el campo 'codigo'
            'codigo.required'    => 'El código es obligatorio.',
            'codigo.unique'      => 'El código ya existe en la base de datos.',

            // Mensajes para el campo 'apellidos'
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string'   => 'Los apellidos deben ser un texto.',

            // Mensajes para el campo 'nombres'
            'nombres.required'   => 'Los nombres son obligatorios.',
            'nombres.string'     => 'Los nombres deben ser un texto.',

            // Mensajes para el campo 'telefono'
            'telefono.required'  => 'El teléfono es obligatorio.',
            'telefono.unique'    => 'El teléfono ya existe en la base de datos.', // OJO: esta regla no está en rules(), podrías añadirla si deseas.

            // Mensajes para el campo 'correo'
            'correo.required'    => 'El correo es obligatorio.',
            'correo.unique'      => 'El correo ya existe en la base de datos.', // OJO: esta regla tampoco está en rules(), considera agregarla si es necesaria.
        ];
    }
}
