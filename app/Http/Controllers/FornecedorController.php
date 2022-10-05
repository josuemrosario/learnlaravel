<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

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
        //aula 152 refactoring de fornecedor
        return view('app.fornecedor.index');
    

    }

    public function listar(Request $request){
        
        $fornecedores = Fornecedor::with(['produtos'])->where('nome','like','%'.$request->input('nome').'%')
                                    ->where('site','like','%'.$request->input('site').'%')
                                    ->where('uf','like','%'.$request->input('uf').'%')
                                    ->where('email','like','%'.$request->input('email').'%')
                                    //->get(); atualizado na aula 156 para permitir paginação
                                    ->paginate(5);


       
        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores, 'request' => $request->all()]);

    }

    public function adicionar(Request $request){

        $msg = '';
        
        //cadastra se token nao vazio
        if(($request->input('_token') != '') && $request->input('id') == ''){
            //validacao de dados
            $regras =[
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                
                'required' => 'Campo :attribute deve ser preenchido',
                
                'nome.min' => 'Campo :attribute deve ter no mínimo 3 caracteres',
                'uf.min' => 'Campo :attribute deve ter no mínimo 2 caracteres',

                'nome.max' => 'Campo :attribute deve ter no maximo 40 caracteres',
                'uf.max' => 'Campo :attribute deve ter no maximo 2 caracteres',
                
                'email' => 'email inválido'                
            ];

            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';

        }

        //edição
        if($request->input('_token') != '' &&  $request->input('id') != ''){
            
            $msg = '';
            
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'update realizado com sucesso';
            }else{
                $msg = 'update apresentou problema';
                return redirect()->route('app.fornecedor.editar',[ 'id' => $request->input('id'), 'msg' => $msg ]);
            }
        }   

        return view('app.fornecedor.adicionar',['msg' => $msg]);

    }
    
    public function editar($id, $msg = ''){
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor, 'msg' => $msg]);

    }

    //aula 158 implementando remoção de fornecedores
    public function excluir($id){
                
        //usa softdelete para remover o registro
        Fornecedor::find($id)->delete();

        //opção 2 - força deleção do banco 
        //Fornecedor::find($id)->forcedelete();

        return redirect()->route('app.fornecedor');
      

    }
}
