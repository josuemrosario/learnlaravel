<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivos_contato', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('motivos_contato',20);

        });

        /* Deve ser feito por seeder já que estamos populando a tabela pela primeira e unica vez
        MotivosContato::crate(['Duvida']);
        MotivosContato::crate(['Elogio']);
        MotivosContato::crate(['Reclamação']);
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_contatos');
    }
};
