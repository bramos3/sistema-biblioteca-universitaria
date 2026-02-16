<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    
// Este método se ejecuta automáticamente cuando el usuario hace clic en el enlace de verificación enviado por correo.
// Usa una instancia de EmailVerificationRequest, que ya valida el enlace firmado y la autenticación del usuario.
public function __invoke(EmailVerificationRequest $request): RedirectResponse
{
    
      // Si el correo ya fue verificado anteriormente, redirige al dashboard
      // agregando el parámetro 'verified=1' a la URL, lo cual puede usarse para mostrar un mensaje de éxito.
    if ($request->user()->hasVerifiedEmail()) {

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }

    // Si el usuario aún no ha verificado su correo..
    // Intenta marcar el correo del usuario como verificado en la base de datos y devuelve true si se realiza con éxito.
if ($request->user()->markEmailAsVerified()) {
    
    // Aquí se obtiene el usuario autenticado y se guarda en la variable $user.
    $user = $request->user(); 

    // Se dispara el evento Verified pasando el usuario como parámetro.
    // Esto permite que otras partes del sistema escuchen este evento y reaccionen.
    event(new Verified($user)); 

}
// Ya sea que el usuario haya verificado su correo recién, o que ya estuviera verificado,
// esta linea redirige al usuario al dashboard, agregando el parámetro 'verified=1' a la URL.
return redirect()->intended(route('dashboard', absolute: false).'?verified=1');

}
}