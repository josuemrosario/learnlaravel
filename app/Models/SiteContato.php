<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
    
    // aula 121 - Permite que possamos usar o método fill (usado para persistir dados no controller)
    protected $fillable = ['nome','telefone','email','mensagem','motivo_contato_id'];
}
