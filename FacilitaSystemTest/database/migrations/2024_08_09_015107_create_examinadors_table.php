<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinadors', function (Blueprint $table) {
            $table->id();
            $table->string('nomeExaminador', 50);
            $table->string('sobrenomeExaminador', 50);
            $table->string('emailExaminador', 255);
            $table->enum('statusExaminador',['ativo', 'inativo']);
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
        Schema::dropIfExists('examinadors');
    }
}
