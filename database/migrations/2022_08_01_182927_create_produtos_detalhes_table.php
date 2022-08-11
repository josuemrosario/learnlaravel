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
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Aula 84 adicionando chaves estrangeiras
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento',8,2);
            $table->float('largura',8,2);
            $table->float('altura',8,2);

            //constraint
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */



    public function down()
    {

        //remove relacionamento com produto_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {

            //remove a fk
            $table->dropForeign('produtos_detalhes_produto_id_foreign');


        });

        //remove produtos_detalhes
        Schema::dropIfExists('produtos_detalhes');
    }
};
