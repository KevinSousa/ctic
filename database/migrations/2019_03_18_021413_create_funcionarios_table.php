 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('func_id');
            $table->string('func_name');
            $table->string('func_cpf');
            $table->string('func_numero_siap');

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('func_funcao')->unsigned();
            $table->foreign('func_funcao')->references('funcao_id')->on('funcaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
