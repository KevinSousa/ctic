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
            $table->increments('cham_id');
            $table->timestamp('cham_data_chamado');
            $table->enum('cham_grau_urgencia', ['BAIXO', 'MÉDIO', 'ALTA']);
            $table->datetime('cham_data_prevista');
            $table->string('cham_descricao');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('cham_user')->unsigned();
            $table->foreign('cham_user')->references('user_id')->on('users')->onDelete('cascade');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('cham_sala')->unsigned();
            $table->foreign('cham_sala')->references('sala_id')->on('salas')->onDelete('cascade');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('cham_equip')->unsigned();
            $table->foreign('cham_equip')->references('equip_id')->on('equipamentos')->onDelete('cascade');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('cham_tipo_problema')->unsigned();
            $table->foreign('cham_tipo_problema')->references('probl_id')->on('tipo_problemas')->onDelete('cascade');        
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
