<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('description')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->timestamps();

            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('event_sala')->unsigned();
            $table->foreign('event_sala')->references('sala_id')->on('salas')->onDelete('cascade');
            
            /** Chave Estrangeira do banco eventos*/          
            $table->Integer('event_user')->unsigned();
            $table->foreign('event_user')->references('user_id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
