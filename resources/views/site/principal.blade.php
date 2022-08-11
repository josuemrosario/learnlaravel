{{--- 
Aula 60 - Alterado  o caminho relativo das imagens. Trocado o caminho pela função asset() 
Aula 61 - O style virou arquivo separado (estilo_basico.css) e importando dentro da view
Aula 62 - O codigo foi alterado acrescentando extends e yield(no template site\layouts\baisco.blade.php)
Aula 63 - Alterdo titulo para passagem por parametro
Aula 64 - o menu é adiconado diretamente no layout usando include
aula 68 - gerado um formulario generico de contato e adicionado via component (form_contatoblade.php)
aula 69 - A borda dos campos do form agora sao passadas como parametro via @component
--}}
@extends('site.layouts.basico')

@section('titulo','Home')

@section('conteudo')


    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="chamada">
                    <img src="{{asset('/img/check.png')}}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{asset('img/check.png')}}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{asset('img/player_video.jpg')}}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>


                
                {{--formulario de contato--}}
                @component('site.layouts._components.form_contato', ['classe'=>'borda-branca', 'motivos_contato' => $motivos_contato ])
                @endcomponent

            </div>
        </div>
    </div>
@endsection