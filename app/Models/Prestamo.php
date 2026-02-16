<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    // Desactiva los campos de timestamps (created_at y updated_at), ya que la tabla 'prestamos' no tiene esas columnas.
    public $timestamps = false;

    // Especifica que este modelo representa la tabla 'prestamos' en la base de datos.
    protected $table = 'prestamos';

    // Define los campos que pueden ser asignados masivamente mediante métodos como create(), update() o fill().
    // Es una medida de seguridad para evitar que se asignen accidentalmente campos sensibles.
    protected $fillable = [
        'codigo_estudiante',  // Clave foránea que enlaza con la tabla 'estudiantes' (campo 'codigo').
        'fecha_prestamo',     // Fecha en la que se realizó el préstamo del libro.
        'fecha_entrega',      // Fecha programada para devolver el libro.
        'personal',           // Nombre del personal que registró el préstamo.
        'codigo_libro',       // Clave foránea que enlaza con la tabla 'libros' (campo 'codigo').
    ];


    //Aca hemos implementado el metodo(belongsto) que define la relacion inversa entre prestamo y estudiante diciendo
    //que cada prestamo le pertenece a un solo estudiante por eso hacemoos referencia al estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'codigo_estudiante', 'codigo');
    }
    //Aca hemos hemos implementado el metodo(belongsto) que define la ralacion inversa entre prestamo y libro diciendo 
    //que cada prestamo le pertenece a un solo libro por eso hacemos referencia al libro.
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'codigo_libro', 'codigo');
    }
}
