<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //aula 189
        $clientes = Cliente::paginate(10);

        //Aula 188
        return view('app.cliente.index',['clientes'=>$clientes, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //aula 190
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //aula 190
        // validação de campos
        $regras = [
            'nome' => 'required|min:3|max:40'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido ',
            'nome.min' => 'O  campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O  campo nome deve ter no máximo 40 caracteres'
        ];

        $request->validate($regras, $feedback);


        //Salva o cliente enviado pelo formulário
        $clientes = new Cliente();
        $clientes->nome = $request->get('nome');
        $clientes->save();

        return redirect()->route('cliente.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
