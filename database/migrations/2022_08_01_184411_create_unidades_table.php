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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aula 85 relacionamentos um para muitos
            $table->string('unidade',5);
            $table->string('descricao',30);

        });

        //relacionamentos com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //relacionamentos com a tabela produtos_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        //remove relacionamento com produtos
        Schema::table('produtos', function (Blueprint $table) {

            //remove a fk
            $table->dropForeign('produtos_unidade_id_foreign');


        });

        //remove relacionamento com produto_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {

            //remove a fk           
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');


        });


        //Deleta produto_id das tabelas
        Schema::table('produtos', function (Blueprint $table) {

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');

        });

        
        Schema::table('produtos_detalhes', function (Blueprint $table) {

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');

        });

       
        Schema::dropIfExists('unidades');


       
    }
};
