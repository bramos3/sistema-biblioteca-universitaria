<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    use HasFactory;

     //Define los campos que pueden ser asignados masivamente.
    protected $fillable = [
        'codigo',          // Identificador único del libro (clave primaria o campo clave).
        'autor',           // Nombre del autor del libro.
        'editor',          // Nombre del editor o editorial.
        'fecha_creacion',  // Fecha en la que se creó el libro (publicación o alta en el sistema).
        'fecha_emision',   // Fecha de emisión o disponibilidad (p.ej. fecha de adquisición).
    ];


    protected $primaryKey = 'codigo'; // <-- le dices cuál es la clave primaria
    public $incrementing = false;     // <-- porque no es auto-incremental
    protected $keyType = 'string';    // <-- porque tu clave es string, no int

    public function getRouteKeyName()
    {
        return 'codigo';
    }


 //Aca hemos implementado el metodo que define la relacion 1 a 1 con el modelo prestamo, diciendo que un libro tiene 
    //un solo prestamo donde ese prestamo va a tener una clave foranea ('codigo_libro') que apunta a codigo, donde ese codigo es su clave 
    //primaria osea su identificador unico del libro.

    public function prestamo()
    {
        return $this->hasOne(Prestamo::class, 'codigo_libro', 'codigo');
    }
}
