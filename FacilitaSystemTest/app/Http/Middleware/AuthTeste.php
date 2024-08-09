<?php

namespace App\Http\Middleware;

use App\Models\Login;
use Closure;
use Illuminate\Http\Request;

class AuthTeste
{
    public function handle(Request $request, Closure $next, $tipoUser)
    {
        $email = session('email');

        if ($email) {
            $usuario = Login::where('email', $email)->first();

            if (!$usuario) {
                return redirect()->route('login');
            }

            $tipoUsuario = $usuario->tipo_usuario;

            if ($tipoUsuario === $tipoUser) {
                return $next($request);
            } else {
                return back()->withErrors(['email' => 'Acesso não permitido para esse email']);
            }
        }

        return redirect()->route('login');
    }
}
