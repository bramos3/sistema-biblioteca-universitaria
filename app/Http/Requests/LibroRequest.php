<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
{
     /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     * En este caso, se devuelve true, lo que significa que cualquier usuario autenticado puede enviar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define las reglas de validación que se aplicarán a los datos recibidos desde el formulario.
     * Se devuelven como un array asociativo, donde la clave es el nombre del campo y el valor son las reglas separadas por '|'.
     */
    public function rules(): array
    {
        return [
            // 'codigo' es obligatorio, debe ser texto, único en la tabla 'libros' y cumplir un patrón regex (solo letras, números y guiones).
            'codigo'         => 'required|string|unique:libros,codigo|regex:/^[A-Za-z0-9\-]+$/',

            // 'autor' es obligatorio, debe ser texto y tener máximo 40 caracteres.
            'autor'          => 'required|string|max:40',

            // 'editor' también es obligatorio, texto y máximo 40 caracteres.
            'editor'         => 'required|string|max:40',

            // 'fecha_creacion' es obligatoria y debe tener un formato de fecha válido.
            'fecha_creacion' => 'required|date',

            // 'fecha_emision' también es obligatoria, debe ser fecha y debe ser igual o posterior a 'fecha_creacion'.
            'fecha_emision'  => 'required|date|after_or_equal:fecha_creacion',
        ];
    }

    /**
     * Define los mensajes de error personalizados que se mostrarán si alguna validación falla.
     * Esto mejora la experiencia del usuario mostrando mensajes claros y específicos.
     */
    public function messages()
    {
        return [
            // Mensajes relacionados con 'codigo'
            'codigo.required'         => 'El código es obligatorio.',
            'codigo.unique'           => 'El código ya existe en la base de datos.',

            // Mensajes relacionados con 'autor'
            'autor.required'          => 'El autor es obligatorio.',
            'autor.string'            => 'El autor debe ser un texto.',

            // Mensajes relacionados con 'editor'
            'editor.required'         => 'El editor es obligatorio.',
            'editor.string'           => 'El editor debe ser un texto.',

            // Mensajes relacionados con 'fecha_creacion'
            'fecha_creacion.required' => 'La fecha de creación es obligatoria.',
            'fecha_creacion.date'     => 'La fecha de creación debe ser una fecha válida.',

            // Mensajes relacionados con 'fecha_emision'
            'fecha_emision.required'       => 'La fecha de emisión es obligatoria.',
            'fecha_emision.date'           => 'La fecha de emisión debe ser una fecha válida.',
            'fecha_emision.after_or_equal' => 'La fecha de emisión debe ser igual o posterior a la fecha de creación.',
        ];
    }
}