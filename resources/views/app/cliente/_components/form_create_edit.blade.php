@if(isset($cliente->id))
    <form method="post" action='{{ route('cliente.update',['cliente' => $cliente->id ])}}'>
    @method('PUT')
@else
    <form method="post" action='{{ route('cliente.store')}}'>
@endif 
    @csrf


    <input type="text" name="nome" value='{{ $cliente->nome ?? old('nome') }}' placeholder="nome"  class="borda-preta">  
    {{$errors->has('nome') ? $errors->first('nome') : ''}}


    <button type="submit" class="borda-preta">Cadastrar</button>

</form>