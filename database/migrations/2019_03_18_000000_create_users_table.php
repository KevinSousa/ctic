<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_cpf')->unique();
            $table->string('user_telefone');
            $table->string('user_siap_matricula')->unique();
            $table->string('user_email')->unique();
            // $table->timestamp('user_email_verified_at')->nullable();
            $table->string('user_password');
            $table->rememberToken();
            $table->timestamps();

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('user_funcao')->unsigned();
            $table->foreign('user_funcao')->references('funcao_id')->on('funcaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
