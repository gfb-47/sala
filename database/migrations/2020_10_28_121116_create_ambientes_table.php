<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('termodeuso');
            $table->string('nome',45);
            $table->tinyInteger('ativo')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('tipoambiente')->unsigned();
            $table->timestamps();

            $table->foreign('tipoambiente')->references('id')->on('tipo_ambientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambientes');
    }
}
