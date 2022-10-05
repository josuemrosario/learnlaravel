<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;

    
    protected $table = 'produtos_detalhes';

    protected $fillable = ['nome', 'descricao','peso','unidade_id'];

    //aula 177 estabelecendo relacionamento 1x1
    public function item(){
        return $this->belongsTo('App\Models\Item','produto_id', 'id');
    }
}

