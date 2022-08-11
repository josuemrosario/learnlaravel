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
        
        //aula 128 refactoring do projeto
       //criação de fk para associar motivos_contato com site_contatos

       //cria um novo campo na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });


        //migra os codigos de todos os motivos de contato para o novo campo
        DB::statement('update site_contatos set motivo_contato_id = motivo_contato ');

        //cria a fk de motivo_contato_id para a tabela motivos_contato(id)
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivos_contato');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //cria a fk de motivo_contato_id para a tabela motivos_contato(id)
        
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato = motivo_contato_id ');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });



    }
};
