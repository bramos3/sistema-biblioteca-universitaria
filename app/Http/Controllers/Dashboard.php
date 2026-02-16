<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Prestamo;
use Illuminate\Http\Request;


class Dashboard extends Controller
{
  
    // Esta función es una acción del controlador que será llamada cuando se acceda a una determinada ruta en el sistema.
    public function dash()
    {
        //Cuando se llame a esta función, se mostrará esa vista al usuario.
        return view('plantilla.principal');
    }
}