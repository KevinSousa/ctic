<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments(' cham_id');
            $table->timestamps(' cham_data_chamado');
            $table->enum('cham_grau_urgencia', ['BAIXO', 'MÉDIO', 'ALTA']);
            $table->int('cham_funcionario');
            $table->int('cham_sala  ');
            $table->int('cham_equip');
            $table->int('cham_tipo_problema');
            $table->datetime('cham_data_prevista');
            $table->string('cham_descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamados');
    }
}
