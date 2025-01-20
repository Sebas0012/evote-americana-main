<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleccion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 100);
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_cierre');
            $table->timestamp('fecha_creado')->useCurrentOnUpdate();
            $table->timestamp('fecha_modificado');
            $table->integer('id_creador');
            $table->integer('id_ultimo_modificador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleccion');
    }
}
