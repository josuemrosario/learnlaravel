<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        //return $this->belongsToMany('App\Models\Produto','pedidos_produtos');
        
        //quando os nomes de tabelas não são padronizados
        return $this->belongsToMany('App\Models\Produto','pedidos_produtos','pedido_id','produto_id')->withPivot('id','created_at','updated_at');
    }
}
