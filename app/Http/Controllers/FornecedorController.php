<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        //$fornecedores = ['Fornecedor 1'];
        
    /*  recho retirado na aula 150         
        $fornecedores = [
            0=> [
                'nome'=> 'Fornecedor 1', 
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1=> [
                'nome'=> 'Fornecedor 2', 
                'status' => 'S',
                'cnpj' => '0',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            2=> [
                'nome'=> 'Fornecedor 3', 
                'status' => 'S',
                'cnpj' => '0',
                'ddd' => '32',
                'telefone' => '0000-0000'
            ]                
        ];

        //$fornecedores = [];

        return view('app.fornecedor.index', compact('fornecedores'));
        //return view('app.fornecedor.index');
    
    */


    //Aula 150 implementando menu de opções
    return view('app.fornecedor');
    

    }
}
