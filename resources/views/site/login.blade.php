{{--- 
Aula 60 - Alterado  o caminho relativo das imagens. Trocado o caminho pela função asset() 
Aula 61 - O style virou arquivo separado (estilo_basico.css) e importando dentro da view
Aula 62 - O codigo foi alterado acrescentando extends e yield(no template site\layouts\baisco.blade.php)
Aula 63 - Alterado titulo para passagem por parametro
Aula 64 - o menu é adiconado diretamente no layout usando include
Aula 65 - preparado formulario para ser processado ( adcionaro route, method e names)
aula 68 - gerado um formulario generico de contato e adicionado via component (form_contatoblade.php)
aula 69 - A borda dos campos do form agora sao passadas como parametro via @component
--}}
@extends('site.layouts.basico')

@section('titulo',$titulo)

@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action={{ route('site.login')}} method='post'>
                    @csrf
                    
                    <input name="usuario" value="{{ old('usuario') }}" type="text"     placeholder="usuario" class="borda-preta">
                    {{-- Aula 146 - recebendo parametros usuario e senha --}}
                    {{$errors->has('usuario') ? $errors->first('usuario') : '' }}

                    <input name="senha"   value="{{ old('senha')   }}" type="password" placeholder="Digite a Senha" class="borda-preta">
                    {{-- Aula 146 - recebendo parametros usuario e senha --}}
                    {{$errors->has('senha') ? $errors->first('senha') : '' }}
                    
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) && ($erro != '') ? $erro : '';}}
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{asset('img/facebook.png')}}">
            <img src="{{asset('img/linkedin.png')}}">
            <img src="{{asset('img/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{asset('img/mapa.png')}}">
        </div>
    </div>
@endsection

