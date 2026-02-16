<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

// Define la clase PruebaComponent que extiende de Component, lo que la convierte en un componente Livewire.
class PruebaComponent extends Component
{
    // Método obligatorio en los componentes Livewire. Es el que se encarga de generar y retornar la vista.
    public function render()
    {
        // Devuelve la vista asociada a este componente. En este caso, busca el archivo Blade:
        // 'resources/views/livewire/prueba-component.blade.php'
        return view('livewire.prueba-component');
    }
}