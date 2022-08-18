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
    ->middleware('log.acesso')
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
   // ->get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])
    ->name('site.contato');


//Aula 122 - alterado da função contato para função salvar
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');


// AULA 145 - Implementação do login
Route::get('/login/{erro?}',[\App\Http\Controllers\LoginController::class,'index'])->name('site.login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');


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


// Aula 142 acrescentado o middleware para todo o grupo de rotas em vez de rota individuais
// Aula 143 acrescentado parametros para ser passar o middleware
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){

    Route::get('/cliente',[\App\Http\Controllers\ClienteController::class,'index'])
        ->name('app.cliente');

    //Route::get('/fornecedores',function(){ return 'fornecedores';})->name('app.fornecedores');
    Route::get('/fornecedor',[\App\Http\Controllers\FornecedorController::class,'index'])
        ->name('app.fornecedor');

    //aula 152 implementando o cadastro de fornecedores
    Route::post('/fornecedor/listar',[\App\Http\Controllers\FornecedorController::class,'listar'])
        ->name('app.fornecedor.listar');

    //aula 156 implementando paginação
    Route::get('/fornecedor/listar',[\App\Http\Controllers\FornecedorController::class,'listar'])
        ->name('app.fornecedor.listar');        
        
    Route::get('/fornecedor/adicionar',[\App\Http\Controllers\FornecedorController::class,'adicionar'])
        ->name('app.fornecedor.adicionar');        

    Route::post('/fornecedor/adicionar',[\App\Http\Controllers\FornecedorController::class,'adicionar'])
        ->name('app.fornecedor.adicionar');
    
    Route::get('/fornecedor/editar/{id}/{msg?}',[\App\Http\Controllers\FornecedorController::class,'editar'])
        ->name('app.fornecedor.editar');        

    Route::get('/produto',[\App\Http\Controllers\ProdutoController::class,'index'])
        ->name('app.produto');


    //Aula 150 - Implementando o menu de opções
    Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])         
        ->name('app.home');       

    Route::get('/sair',[\App\Http\Controllers\LoginController::class,'sair'])         
        ->name('app.sair');
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







