<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'descricao','peso','unidade_id'];

    //aula 177 estabelecendo relacionamento 1x1
    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }
}
