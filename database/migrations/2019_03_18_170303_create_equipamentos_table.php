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
            $table->Integer('equip_tombamento')->unsigned();
            $table->string('equip_marca');

            $table->primary('equip_tombamento');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('equip_tipo')->unsigned();
            $table->foreign('equip_tipo')->references('tipo_id')->on('tipo_equipamentos')->onDelete('cascade');
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
