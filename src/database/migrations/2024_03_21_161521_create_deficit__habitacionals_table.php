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
        Schema::create('deficit_habitacionais', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_ibge')->unsigned();
            $table->foreign('cod_ibge')->references('cod_ibge')->on('municipios');
            $table->string('adensado');
            $table->string('comodo');
            $table->string('improvisado');
            $table->string('onus');
            $table->string('rustico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deficit_habitacionais');
    }
};
