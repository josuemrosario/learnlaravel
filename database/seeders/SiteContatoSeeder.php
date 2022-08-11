<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aula 118 - Seeder parte 2
        /* comentado na aula 119 para trocar por um factory gerador aleatorio de dados

        $contato = new SiteContato();
        $contato->nome = 'Sitema SG';
        $contato->telefone = '(11) 9 9999 9999';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja Bem vindo ao sistema Super Gestão';
        $contato->save();
        */

        //Aula 119 - Gera aleatoriamente dados

        \App\Models\SiteContato::factory()->count(100)->create();


    }
}
