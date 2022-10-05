<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;


class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        
        return view('app.pedido_produto.create',['pedido'=>$pedido,  'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        
        // aula 194
        $regras =[
            'produto_id'  => 'exists:produtos,id',
            'quantidade'  => 'required'
        ];

        $feedback = [
            
            'produto_id.exists' => 'Produto informado não existe',
            'required' => 'O campo :attribute precisa ser preenchido'
            
        ];

        $request->validate($regras,$feedback);
        
        /* Retirado na aula 197  (metodo 1 de insercão)
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        
        $pedidoProduto->save();
        */

        /* Implementado e Retirado na aula 197  (metodo 2 de insercão)
        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        );
        */

        //Aula 193 - metodo 3 de insersão (multiplos registros de uma só vez)
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create',['pedido'=>$pedido->id]);

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
     * @param  int  PedidoProduto $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //aula 198
        /*
        Print_r($pedido->getAttributes());
        echo '<hr>';
        Print_r($produto->getAttributes());
        */
        
        //echo $pedido->id.' - '.$produto->id;

        //forma convencional de deletar
        /*
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
        */


        //usando detach (deletar usando relacionamento)
        //$pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create',['pedido'=>$pedido_id]);


    }
}
