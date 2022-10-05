<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Aula 162 - Implementando cadastro produtos index
        
        // Aula 180 ---> versar lazy loading (carrega o relacionamento apenas quando necessário)
        //$produtos = Item::paginate(10);

        // Aula 180 ---> versar Eager loading (carrega todos os relacionamentos)
        $produtos = Item::with (['itemDetalhe','fornecedor'])->paginate(10);

        /*
        foreach($produtos as $key => $produto){
            //print_r($produto->getAttributes());
            //echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){
                print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;

            }

            //echo '<hr>';
        }
        */
        return view('app.produto.index',['produtos'=>$produtos, 'request' => $request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $unidades = Unidade::All();

        /** aula 186 */
        $fornecedores = Fornecedor::all();
        
        return view('app.produto.create',['unidades'=>$unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aula 165 validação de dados

        $regras = [
            'nome'       => 'required|min:3|max:40',
            'descricao'  => 'required|min:3|max:2000',
            'peso'       => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'Campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'Campo nome deve ter no máximo 2000 caracteres',
            'peso.integer' => 'Peso deve ser inteiro',
            'unidade_id.exists' => 'Unidade de medida não existe',
            'fornecedor_id.exists' => 'Fornecedor informado não existe'
        ];
        
        $request->validate($regras,$feedback);

        //Aula 164 
        Item::create($request->all());
        
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto'=>$produto]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();

        /** aula 186 */
        $fornecedores = Fornecedor::all();


        return view('app.produto.edit',['produto'=>$produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create',['produto'=>$produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //dd($request->all());
        $regras = [
            'nome'       => 'required|min:3|max:40',
            'descricao'  => 'required|min:3|max:2000',
            'peso'       => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'Campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'Campo nome deve ter no máximo 2000 caracteres',
            'peso.integer' => 'Peso deve ser inteiro',
            'unidade_id.exists' => 'Unidade de medida não existe',
            'fornecedor_id.exists' => 'Fornecedor informado não existe'
        ];
        
        $request->validate($regras,$feedback);
        $produto->update($request->all());
        return redirect()->route('produto.show',['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
