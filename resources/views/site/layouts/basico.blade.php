{{--
   Aula 63 - Adicionado titulo por parametro
   Aula 64 - o menu é adiconado diretamente no layout usando include
--}}

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <title> Super Gestão -  @yield('titulo') </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/estilo_basico.css')}}">
    </head>

    <body>
        
        {{--Menu da pagina--}}
        @include('site.layouts._partials.topo')
        
        @yield('conteudo')
    </body>
</html>