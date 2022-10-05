<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao','peso','unidade_id','fornecedor_id'];

    //aula 177 estabelecendo relacionamento 1x1
    public function itemDetalhe(){
        return $this->hasOne('App\Models\ItemDetalhe','produto_id', 'id');
    }

    //aula 183 orm 1 para n
    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    //aula 195
    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido','pedidos_produtos','produto_id','pedido_id');
    }
}
