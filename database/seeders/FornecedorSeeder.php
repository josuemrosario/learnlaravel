<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//incluido na aula 117 seeders parte 1
use App\Models\Fornecedor;
use DB;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //incluido na aula 117 seeders parte 1
        // primeira maneira - instanciando o objeto e salvando
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //segunda maneira - Usando create (na classe fornecedor a var fillable precisa estar instanciada)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'Fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        //terceira maneira - usando método insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'Fornecedor300.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
