<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        //aula 148 tratando erro ususario e senha invalidos
         
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuário e ou senha não existe';
        };         

        //aula 149 erro pela super global session
        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a pagina';
        };         


        return view('site.login',['titulo'=>'login', 'erro'=>$erro ]);
    }

    public function autenticar(Request $request){

        //aula 146 - Recebendo parametros de usuário
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];


        //Mensagens de feedback de validação
        $feedback =[
            'usuario.email' => 'Email incorreto',
            'senha.required' => 'Senha obrigatória'

        ];
        
        $request->validate($regras,$feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Iniciar o model user
        $user = new User();


        $usuario = $user->where('email',$email)
                        ->where('password',$password)
                        ->get()
                        ->first();
        
        
        if(isset($usuario->name)){
            
            //aula 149 iniciando session e validando rotas protegidas
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;


            return redirect()->route('app.home');

        }else{

        //echo 'usuario nao existe ou senha incorreta';
            // aula 148 redirecionando a rota quando senha incorreta
            return redirect()->route('site.login',['erro'=>1]);

        }
        
      

    }

    public function sair(){

        echo 'sair';
    }
}
