<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\logAcesso;

class logAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        //dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestURI();
        LogAcesso::create(['log' => "IP $ip requisitou rota $route"]);
        //return Response('Chegamos e finalizamos no middleware');
        
        //Aula 144 - Manipulando resposta
        //return $next($request);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status e o texto da resposta foram modificados');

        return $resposta;

    }
}
