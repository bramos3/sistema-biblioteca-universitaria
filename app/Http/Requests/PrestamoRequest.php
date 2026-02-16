<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     * En este caso, siempre retorna true, por lo que no hay restricciones de autorización.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define las reglas de validación que se aplican al formulario de préstamo.
     * Cada campo debe cumplir con ciertas condiciones antes de ser aceptado.
     */
    public function rules(): array
    {
        return [
            // El código del estudiante es obligatorio, debe ser texto, existir en la tabla 'estudiantes' (columna 'codigo'),
            // y no puede tener más de 40 caracteres.
            'codigo_estudiante' => 'required|string|exists:estudiantes,codigo|max:40',

            // La fecha de préstamo es obligatoria y debe tener un formato válido de fecha.
            'fecha_prestamo'    => 'required|date',

            // La fecha de entrega también es obligatoria, debe tener formato de fecha,
            // y ser igual o posterior a la fecha del préstamo.
            'fecha_entrega'     => 'required|date|after_or_equal:fecha_prestamo',

            // El nombre del personal que realiza el préstamo es obligatorio, debe ser texto y máximo 70 caracteres.
            'personal'          => 'required|string|max:70',

            // El código del libro es obligatorio, debe ser texto, debe existir en la tabla 'libros' (columna 'codigo'),
            // tener un máximo de 40 caracteres y coincidir con el patrón de letras, números y guiones.
            'codigo_libro'      => 'required|string|exists:libros,codigo|max:40|regex:/^[A-Za-z0-9\-]+$/',
        ];
    }

    /**
     * Define los mensajes personalizados que se mostrarán si la validación falla.
     * Esto mejora la experiencia del usuario mostrando mensajes claros y comprensibles.
     */
    public function messages(): array
    {
        return [
            // Mensajes relacionados con 'codigo_estudiante'
            'codigo_estudiante.required' => 'El código del estudiante es obligatorio.',
            'codigo_estudiante.exists'   => 'El código del estudiante no existe en la base de datos.',

            // Mensaje si falta la fecha de préstamo
            'fecha_prestamo.required'    => 'La fecha de préstamo es obligatoria.',

            // Mensaje si falta la fecha de entrega
            'fecha_entrega.required'     => 'La fecha de entrega es obligatoria.',

            // Mensaje si la fecha de entrega es anterior a la de préstamo
            'fecha_entrega.after_or_equal' => 'La fecha de entrega debe ser igual o posterior a la fecha de préstamo.',

            // Mensaje si no se llena el campo del personal
            'personal.required'          => 'El nombre del personal es obligatorio.',

            // Mensajes relacionados con 'codigo_libro'
            'codigo_libro.required'      => 'El código del libro es obligatorio.',
            'codigo_libro.exists'        => 'El código del libro no existe en la base de datos.',
        ];
    }
}
