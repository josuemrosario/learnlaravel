{{--- 
Aula 60 - Alterado  o caminho relativo das imagens. Trocado o caminho pela função asset() 
Aula 61 - O style virou arquivo separado (estilo_basico.css) e importando dentro da view
Aula 62 - O codigo foi alterado acrescentando extends e yield(no template site\layouts\baisco.blade.php)
Aula 63 - Alterado titulo para passagem por parametro
Aula 64 - Adicionado o menu através de include
--}}

@extends('site.layouts.basico')

@section('titulo','Sobre Nós')

@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Olá, eu sou o Super Gestão</h1>
        </div>

        <div class="informacao-pagina">
            <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
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
