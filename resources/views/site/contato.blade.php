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
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">

                {{--formulario de contato--}}
                @component('site.layouts._components.form_contato', ['classe'=>'borda-preta', 'motivos_contato' => $motivos_contato ])
                    <p> A nossa equipe analisará a sua mensagem e retornaremos o mais breve possível</p>
                    <p> Nosso tempo médio de resposta é de 48 horas</p>
                @endcomponent
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

