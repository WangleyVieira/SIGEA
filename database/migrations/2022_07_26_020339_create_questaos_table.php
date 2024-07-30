<?php

use App\Questao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_questao')->nullable();
            $table->text('descricao')->nullable();
            $table->text('titulo_questao')->nullable();
            $table->text('resposta')->nullable();

            //Tópicos
            $table->bigInteger('id_topico')->unsigned()->nullable();
            $table->foreign('id_topico')->references('id')->on('topicos');

            //Disciplina
            $table->bigInteger('id_disciplina')->unsigned()->nullable();
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');

            $table->bigInteger('cadastradoPorUsuario')->unsigned()->nullable();
            $table->foreign('cadastradoPorUsuario')->references('id')->on('users');
            $table->bigInteger('alteradoPorUsuario')->unsigned()->nullable();
            $table->foreign('alteradoPorUsuario')->references('id')->on('users');
            $table->bigInteger('inativadoPorUsuario')->unsigned()->nullable();
            $table->foreign('inativadoPorUsuario')->references('id')->on('users');
            $table->date('dataInativado')->nullable();
            $table->text('motivoInativado')->nullable();
            $table->boolean('ativo')->default(Questao::ATIVO);
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
        Schema::dropIfExists('questaos');
    }
}
