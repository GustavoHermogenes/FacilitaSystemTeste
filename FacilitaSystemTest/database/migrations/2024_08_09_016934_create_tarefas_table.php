<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeTarefa', 50);
            $table->string('descricaoTarefa', 50);
            $table->string('entregaTarefa')->nullable();
            $table->string('vencimentoTarefa');
            $table->foreignId('idUsuario')->constrained('usuarios');
            $table->enum('prioridadeTarefa', ['alta','média','baixa'])->default('baixa');
            $table->enum('statusTarefa',['concluída','em progresso','incompleta'])->default('em progresso');
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
        Schema::dropIfExists('tarefas');
    }
}
