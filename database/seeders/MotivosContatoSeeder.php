<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\MotivosContato;

class MotivosContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aula 127 refactoring parte 1
        MotivosContato::create(['motivos_contato' => 'Duvida']);
        MotivosContato::create(['motivos_contato' => 'Elogio']);
        MotivosContato::create(['motivos_contato' => 'Reclamação']);
    }
}
