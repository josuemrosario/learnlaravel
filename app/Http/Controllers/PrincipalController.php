<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivosContato;

class PrincipalController extends Controller
{
    public function principal(){
        //echo 'ola, seja bem vindo ao curso';

        // aula 126 - ajustando formulario na rota principal
        /*
        $motivos_contato = [

            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'

        ]; */


        //aula 127 refactoring do projeto super gestão parte 1
        $motivos_contato = MotivosContato::all();

        return view('site.principal', ['motivos_contato'=>$motivos_contato]);
    }
}
