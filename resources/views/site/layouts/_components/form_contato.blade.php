{{-- 
  Aula 69 - A borda dos campos do form agora sao passadas como parametro via @component
--}}
{{$slot}}
<form action={{ route('site.contato')}} method="post">
    
    @csrf
    {{-- Aula 124 adicionado os values. Se houve dados no old() que é chamado apos um erro
    esses dados são inseridos novamente no formulario  --}}
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    @if($errors->has('nome'))
      {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone"  value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    {{$errors->has('nome') ? $errors->first('telefone'):'' }}
    <br>
    
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    {{$errors->has('email') ? $errors->first('email'):'' }}
    <br>
  

    <select name="motivo_contato"  class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ( $motivos_contato as $key => $motivo )
          <option value="{{$motivo->id}}" {{old('motivo_contato')==$motivo->id ? 'selected' : ''}} >{{$motivo->motivos_contato}}</option>
        @endforeach


        {{-- Aula 125 option foi retirado. Valors do textvalue estáo sendo passado por parametro

        <option value="1" {{old('motivo_contato')==1 ? 'selected' : ''}} >Dúvida</option>
        <option value="2" {{old('motivo_contato')==2 ? 'selected' : ''}} >Elogio</option>
        <option value="3" {{old('motivo_contato')==3 ? 'selected' : ''}} >Reclamação</option>
        --}}
    </select>
    {{$errors->has('motivo_contato') ? $errors->first('motivo_contato'):'' }}
    <br>
    
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem')!='' ? old('mensagem') : '' }}</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem'):'' }}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>



@if($errors->any())
  <div style='position:absolute; top:0px; left:0px; width:30%; background:red'>
    @foreach ($errors->all() as $erro)
        {{ print_r($erro)}}
        <br>
    @endforeach

  </div> 
@endif



