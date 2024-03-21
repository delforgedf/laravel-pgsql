<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('has_vinculo_sus')->nullable();
            $table->string('tp_estabelecimento')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('cnes')->nullable();
            $table->string('cd_mec')->nullable();
            $table->string('dt_criacao')->nullable();
            $table->string('dep_administrativo')->nullable();
            $table->boolean('has_convenio')->nullable();
            $table->string('nome')->nullable();
            $table->string('tp_unidade_saude')->nullable();
            $table->string('qtd_alunos_matriculados')->nullable();
            $table->integer('cod_ibge')->unsigned();
            $table->foreign('cod_ibge')->references('cod_ibge')->on('municipios');
            $table->integer('tp_unidade')->unsigned();
            $table->foreign('tp_unidade')->references('id')->on('tipo_unidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
