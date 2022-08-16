<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //Aula 143 : acrescentado $metodo_autenticacao e $perfil
     public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
 
        session_start();
        
        if(isset($_SESSION['email']) && $_SESSION['email'] != '' ){
            return $next($request);            
        }else{
            return redirect()->route('site.login',['erro'=>2]);
        }
    }
}
