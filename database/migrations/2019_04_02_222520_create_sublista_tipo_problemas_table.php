<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublistaTipoProblemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublista_tipo_problemas', function (Blueprint $table) {
            $table->increments('sub_id');
            $table->string('sub_nome');
 
            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('sub_probl')->unsigned();
            $table->foreign('sub_probl')->references('probl_id')->on('tipo_problemas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sublista_tipo_problemas');
    }
}
