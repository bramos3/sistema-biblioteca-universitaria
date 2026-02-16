<?php // Inicio del archivo PHP

namespace App\Models; // Define el espacio de nombres para organizar mejor las clases y evitar conflictos de nombres

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Comentado: esta línea se usa si se quiere forzar verificación de email, pero aquí no se necesita

use Illuminate\Database\Eloquent\Factories\HasFactory; // Permite usar factories para crear instancias del modelo, útil en pruebas o para insertar datos de prueba
use Illuminate\Foundation\Auth\User as Authenticatable; // Importa la clase base que incluye funcionalidades de autenticación (login, etc.)
use Illuminate\Notifications\Notifiable; // Permite que este modelo reciba notificaciones
use Illuminate\Support\Str; // Importa la clase Str para manipulación de cadenas (como obtener iniciales del nombre)

class User extends Authenticatable // Define la clase User que extiende la clase Authenticatable (hereda funciones de autenticación)
{
    /** @use HasFactory<\Database\Factories\UserFactory> */ // Anotación que indica el uso de la factory específica para este modelo

    use HasFactory, Notifiable; // Indica que el modelo usará los traits HasFactory y Notifiable (factories y notificaciones)

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ // Define los atributos que se pueden asignar masivamente (por ejemplo, al crear un usuario con create())
        'name', // El nombre del usuario se puede asignar en masa
        'email', // El correo también
        'password', // La contraseña también
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [ // Define qué atributos deben ocultarse al convertir el modelo en un array o JSON
        'password', // Oculta la contraseña para que no se exponga
        'remember_token', // Oculta el token de "recordarme", usado en sesiones persistentes
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array // Define conversiones automáticas (casts) para ciertos atributos del modelo
    {
        return [
            'email_verified_at' => 'datetime', // Convierte el campo email_verified_at a un objeto DateTime
            'password' => 'hashed', // Indica que el campo password debe ser automáticamente hasheado(contraseña protegida) al asignarse
        ];
    }

    
    public function initials(): string // Método público que devuelve las iniciales del usuario
    {
        return Str::of($this->name) // Crea una instancia de la clase Str con el nombre del usuario
            ->explode(' ') // Divide el nombre por espacios en palabras
            ->take(2) // Toma las dos primeras palabras (por ejemplo: nombre y apellido)
            ->map(fn ($word) => Str::substr($word, 0, 1)) // Toma la primera letra de cada palabra
            ->implode(''); // Une las letras para formar las iniciales (por ejemplo: Juan Pérez → JP)
    }
}
