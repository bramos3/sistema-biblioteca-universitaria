<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Un modelo en laravel, es una clase que representa una tabla en tu base de datos.
class Estudiante extends Model
{
    // Usa el trait HasFactory, útil para generar instancias del modelo automáticamente en pruebas o seeders.
    use HasFactory;

    // Especifica el nombre exacto de la tabla asociada a este modelo en la base de datos.
    protected $table = 'estudiantes';

    // Define que la clave primaria de esta tabla es 'codigo' en lugar del valor por defecto 'id'.
    protected $primaryKey = 'codigo';

    // Indica que la clave primaria no es autoincrementable (por ejemplo, es un texto y no un entero).
    public $incrementing = false;

    // Especifica que el tipo de la clave primaria es 'string', no 'int'.
    protected $keyType = 'string';

    // Este método sobrescribe la forma en que Laravel obtiene la clave para las rutas (route model binding).
    // En lugar de buscar por 'id', usará 'codigo'.
    public function getRouteKeyName()
    {
        return 'codigo';
    }

    // Desactiva los campos de timestamps (created_at y updated_at), ya que la tabla no los usa.
    public $timestamps = false;

    // Define los campos que pueden ser asignados masivamente mediante create() o fill().
    protected $fillable = [
        'codigo',
        'apellidos',
        'nombres',
        'telefono',
        'correo',
    ];
    //El prestamos va a tener dos claves foraneas
//aca Hemos implementado el metodo que define la relacion 1 a muchos con el modelo prestamos, diciendo que un estudiante
//puede realizar muchos prestamos, donde ese prestamo va a tener una clave foranea ('codigo_estudiante') que apunta al codigo, donde ese
// codigo es su clave primaria, osea su identificador unico del estudiante.

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'codigo_estudiante', 'codigo');
    }
}