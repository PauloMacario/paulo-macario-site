<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ControlFinance\Acesso;
use App\Models\User;

class AccessAttempt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            return $next($request);
        }

        $usuarioDoSistema = User::where('email', $request->email)->first();

        if ($usuarioDoSistema) {
            return $next($request);
        }

        $aceso = Acesso::where('email', $request->email)->first();
       
        if ($aceso) {
            $aceso->tentativas++;
            $aceso->senha_forcada = $request->password;
            $aceso->ip = $request->ip();
            $aceso->update();

            return $next($request);
        }

        $dataAccess = [];

        $dataAccess = [
            "email" => $request->email,
            "ip" => $request->ip(),
            "tentativas" => 1,
            "senha_forcada" => $request->password,
            "created_at" => now(),
            "updated_at" => now(),
        ];

        Acesso::create($dataAccess);

        return $next($request);
    }
}
