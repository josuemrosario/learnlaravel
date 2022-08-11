<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    //arrumando o nome do tabela para o eloquent encontrar
    protected $table = 'fornecedores';
    
    // adicionado na aula 93 - permite executar a classe sem instanciar
    protected $fillable = ['nome','site','uf','email'];

}
