<h3> Fornecedores - view </h3>

@php 


@endphp

{{--@dd($fornecedores)--}}


{{-- comentario : aula 44 if no blade
@if(count($fornecedores) > 0 && count($fornecedores)<=10)
    <h3> Menos de 10 fornecedores estao cadastrados</h3>
@elseif(count($fornecedores)>10)
    <h3> Mais 10 fornecedores estao cadastrados</h3>
@else
    <h3> Ainda nao existem fornedores cadastrados</h3>
@endif
--}}

{{-- comentario : aula 45 unless

@dd($fornecedores)

Fornecedor: {{ $fornecedores[0]['nome']}}
<br>
Status: {{ $fornecedores[0]['status']}}
<br>
@if(!($fornecedores[0]['status']=='S'))
    Fornecedor inativo
@endif
<br>
@unless($fornecedores[0]['status']=='S')
    Fornecedor inativo
@endunless

--}}

{{-- comentario : aula 46 isset 

@isset($fornecedores)

    Fornecedor: {{ $fornecedores[1]['nome']}}
    <br>
    Status: {{ $fornecedores[1]['status']}}
    <br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ:  {{ $fornecedores[1]['cnpj']}}
    @endisset    
@endisset

--}}

{{-- 51 switch/case--}}

{{--
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[2]['nome']}}
    <br>
    Status: {{ $fornecedores[2]['status']}}
    <br>
    CNPJ:  {{ $fornecedores[2]['cnpj'] ?? 'Dado nao preenchido' }}
    <br>
    Telefone:  {{ $fornecedores[2]['ddd'] ?? '' }} {{ $fornecedores[2]['telefone'] ?? '' }}
    @switch($fornecedores[2]['ddd'] )
        @case('11')
            São paulo - Sp
            @break
        @case('32')
            Juiz de Fora - MG
            @break
        @case('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado
            @break    
    @endswitch
@endisset
--}}

{{-- 52 for --}}

{{--
@isset($fornecedores)
    @for( $i = 0 ; isset($fornecedores[$i]) ; $i++ )
        Fornecedor: {{ $fornecedores[$i]['nome']}}
        <br>
        Status: {{ $fornecedores[$i]['status']}}
        <br>
        CNPJ:  {{ $fornecedores[$i]['cnpj'] ?? 'Dado nao preenchido' }}
        <br>
        Telefone:  {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? '' }}
        <br>
        -----------------------
        <br>
    @endfor
@endisset
--}}

{{-- 53 while --}}

{{--
@isset($fornecedores)
    @php $i = 0 @endphp
    @while(@isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome']}}
        <br>
        Status: {{ $fornecedores[$i]['status']}}
        <br>
        CNPJ:  {{ $fornecedores[$i]['cnpj'] ?? 'Dado nao preenchido' }}
        <br>
        Telefone:  {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? '' }}
        <br>
        -----------------------
        <br>
        @php $i++ @endphp
    @endwhile
@endisset
--}}

{{-- 54 foreach --}}

{{-- 
@isset($fornecedores)
    
    @foreach ( $fornecedores as $indice => $fornecedor )
        Fornecedor: {{ $fornecedor['nome']}}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ:  {{ $fornecedo['cnpj'] ?? 'Dado nao preenchido' }}
        <br>
        Telefone:  {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        -----------------------
        <br>
    @endforeach    
@endisset
--}}

{{-- 55 forelse --}}
{{--

@isset($fornecedores)
    
    @forelse ( $fornecedores as $indice => $fornecedor )
        Fornecedor: {{ $fornecedor['nome']}}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ:  {{ $fornecedo['cnpj'] ?? 'Dado nao preenchido' }}
        <br>
        Telefone:  {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        -----------------------
        <br>
    @empty
        Não existem fornecedores cadastrados 
    @endforelse  
@endisset
-- }}



{{-- 57 variavel loop --}}


@isset($fornecedores)
    
    @foreach ( $fornecedores as $indice => $fornecedor )

        Iteracao atual: {{ $loop->iteration }} <br>
        Primeira iteração ? : {{ $loop->first }} <br>
        ultima iteração ? : {{ $loop->last }} <br>
        Total de registros : {{ $loop->count }} <br>
        <br>
        
        Fornecedor: {{ $fornecedor['nome']}}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ:  {{ $fornecedo['cnpj'] ?? 'Dado nao preenchido' }}
        <br>
        Telefone:  {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        -----------------------
        <br>
        @if($loop->last)
            @dd($loop)
        @endif
    @endforeach    
@endisset





