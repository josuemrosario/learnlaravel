<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{

    //138 implementando middlewares no método constructor dos controllers
    //139 retirado chamada ao middleware
    
    public function __construct(){
        //138 implementando middlewares no método constructor dos controllers
        $this->middleware('log.acesso');

    } 


    public function sobreNos(){
        //echo 'Sobre Nós';
        return view('site.sobre-nos');
    }
}
