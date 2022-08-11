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
        // aula 81 alteração em tabela pre existente
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf',50);
            $table->string('email',150);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // aula 82 migration metodos up e down
        Schema::table('fornecedores', function (Blueprint $table) {
            //$table->dropColumn('uf');
            //$table->dropColumn('email');
            $table->dropColumn('uf','email');
        
        });

    }
};
