<?php

use Illuminate\Support\Facades\Route;

//Aula 136 - Criando meu primeiro middleware
use App\Http\middleware\logAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Comentario: Primeira maneira de implementar rotas. Usando funcao de callback

Route::get('/', function () {
    //return view('welcome');
    return 'ola, seja bem vindo ao curso';
}); */


// Alterado na aula 135 Criando primeiro middleware
//Acrescentado middleware()
Route::middleware(logAcessoMiddleware::class)
    ->get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])
    ->name('site.index');

/*
Route::get('/sobre-nos', function () {
    return 'sobre-nos';
}); */

Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');

/* Route::get('/contato', function () {
    return 'contato';
}); */

//Rotas para a pagina de contato
// Alterado na aula 135 acrescentado middleware
//Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::middleware(logAcessoMiddleware::class)
    ->get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])
    ->name('site.contato');


//Aula 122 - alterado da função contato para função salvar
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login',function(){ return 'login';})->name('site.login');

/*
comentario: criado na aula 33 para estudo de expressões regulares

Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        String $nome = 'Desconhecido', 
        int $categoria_id = 1 // 1 - id da categoria informacao
    ){
        echo "Parametros passados - nome: $nome categoria: $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
*/

Route::prefix('/app')->group(function(){
    Route::get('/clientes',function(){ return 'clientes';})->name('app.clientes');
    //Route::get('/fornecedores',function(){ return 'fornecedores';})->name('app.fornecedores');
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedores');
    Route::get('/produtos',function(){ return 'produtos';})->name('app.produtos');
});

/* Aulas 38: Redirecionanento de rotas 

Route::get('/rota1',function(){ echo 'rota1';})->name('site.rota1');

Route::get('/rota2',function(){ 
    
    return redirect()->route('site.rota1');

})->name('site.rota2');

// Route::redirect('/rota2','/rota1');

*/


// Aula 40 : encaminhando parametros para a rota

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class,'teste'])->name('teste');


// Aula 39 - Rota de fallback

Route::fallback(function(){

    echo 'A rota acessada nao existe. <a href='.route('site.index').'> Pagina inicial </a> ';
}); 







