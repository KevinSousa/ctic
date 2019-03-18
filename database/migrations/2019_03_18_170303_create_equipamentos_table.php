<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('equip_id');
            $table->string('equip_marca');
            $table->string('equip_tombamento');
            $table->Integer('equip_tipo');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('equip_tipo')->unsigned();
            $table->foreign('equip_tipo')->references('tipo_equipamentos')->on('tipo_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}
