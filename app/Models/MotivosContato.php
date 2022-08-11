<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivosContato extends Model
{
    use HasFactory;

    //alterado para que a tabela que será criada automaticamente pelo laravel tenha o nome correto
    protected $table = 'motivos_contato';

    // permite preenchimento com metodo fill e create
    protected $fillable = ['motivos_contato'];
}
