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
        Schema::create('site_contatos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Aula 71 - Cria os campos do formulario
            //https://laravel.com/docs/9.x/migrations#creating-columns
            $table->string('nome',50);
            $table->string('telefone',20);
            $table->string('email',80);
            $table->integer('motivo_contato');
            $table->text('mensagem');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contatos');
    }
};
