<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 200);
            $table->string('apellido', 200);
            $table->integer('id_lista')->index('id_lista');
            $table->string('url_foto', 250);
            $table->string('created_at', 250);
            $table->string('updated_at', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato');
    }
}
