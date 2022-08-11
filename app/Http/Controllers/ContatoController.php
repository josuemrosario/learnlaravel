<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivosContato;


class ContatoController extends Controller
{
    // Alterado na aula 120 - adicionado o parametro request
    public function contato(Request $request){
        //echo 'contato';
        // array com o titulo é passado para a view e depois para o template
        //var_dump($_POST);

        
        /* Retirado na aula 121
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /* metodo 1 de salvar um contato
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem'); */

        //Metodos mais faceis de salvar um contato
        
        
        //$contato->fill($request->all());
        //print_r($contato->getAttributes());
        
        //$contato->save();
        
        /* -------------- >>>>> COMENTADO PARA FINS DE TESTE DESCOMENTAR FUTURAMENTE

        if(!(empty($request->all()))){
            $contato = new SiteContato();
            $contato->create($request->all());
        }
        */

        /*
        $motivos_contato = [

            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'


        ]; */

        //aula 127 refactoring do projeto super gestão parte 1
        $motivos_contato = MotivosContato::all();        

        return view('site.contato',['titulo'=> 'Contato teste', 'motivos_contato' => $motivos_contato ]);
    }

    public function salvar(Request $request){
        //dd($request);

        
        
        // aula 122 validação de campos obrigatórios
        // aula 123 validação de tamanho minimo e maximo
        // aula 134 customizando as mensagens de feedback
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
             //aula 129 alterado para validação de email
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        

        $mensagens_erro = [
            
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',
            'nome.unique' => 'Já foi cadastrada mensagem para esse nome antes',
            'email.email' => 'Email inválido',
            'mensagem.max' => 'Mensagem precisa  ter no maximo 2000 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido'

        ];
        
        $request->validate($regras,$mensagens_erro);

            // Salva o contato    

            //Sitecontato::create($request->all());
            Sitecontato::create([
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'motivo_contato_id' => $request->motivo_contato,
                'mensagem' => $request->mensagem
        
            ]);

            //aula 130 - Redirecionando a rota após salvamento de contato

            return redirect()->route('site.index');
        
    }
}
