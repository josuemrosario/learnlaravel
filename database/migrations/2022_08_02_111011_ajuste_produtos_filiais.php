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
        //cria a tabela filiais (aula 86)
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aula 85 relacionamentos um para muitos
            $table->string('filial',30);
        });

        
        //cria a tabela produto_filiais(aula 86)
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aula 85 relacionamentos um para muitos
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->float('preco_venda',8,2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);

            //cria foreign key
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos (passam a fazer parte de produtos_filiais)
        Schema::table('produtos',function (Blueprint $table){
            $table->dropColumn('preco_venda', 'estoque_minimo', 'estoque_maximo');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //recria os campos preco_venda','estoque_minimo','estoque_maximo'
        Schema::table('produtos',function(Blueprint $table){
            $table->float('preco_venda',8,2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        //remove as fk criadas
        Schema::table('produto_filiais',function(Blueprint $table){
            $table->dropForeign('produto_filiais_filial_id_foreign');
            $table->dropForeign('produto_filiais_produto_id_foreign');
        });


        //remove as tabelas criadas
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    

    }

};
