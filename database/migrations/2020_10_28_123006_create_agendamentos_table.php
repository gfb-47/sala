<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ambiente')->unsigned();
            $table->bigInteger('user')->unsigned();
            $table->bigInteger('disciplina')->unsigned();
            $table->bigInteger('professorresponsavel')->unsigned();
            $table->bigInteger('motivoutilizacao')->unsigned();
            $table->time('horainicio');
            $table->time('horafim');
            $table->date('data');
            $table->tinyInteger('situacao')->default(1);
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->foreign('ambiente')->references('id')->on('ambientes')->onDelete('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('disciplina')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('professorresponsavel')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('motivoutilizacao')->references('id')->on('motivos_utilizacao')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
