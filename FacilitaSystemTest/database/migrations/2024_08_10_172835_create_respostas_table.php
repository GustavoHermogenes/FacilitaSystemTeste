<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('respostas', function (Blueprint $table) {
                $table->id();
                $table->string('nomeResposta');
                $table->string('descricaoResposta');
                $table->foreignId('idUsuario')->constrained('usuarios');
                $table->foreignId('idTarefa')->constrained('tarefas');
                $table->timestamp('entregaResposta');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
