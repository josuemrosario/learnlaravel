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
        //recria os campos preco_venda','estoque_minimo','estoque_maximo'
        Schema::table('fornecedores',function(Blueprint $table){
            //aula 87 migration - modificador after
            $table->string('site',150)->after('nome')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::table('fornecedores',function(Blueprint $table){
            $table->dropColumn('site');
        });
    }
};
