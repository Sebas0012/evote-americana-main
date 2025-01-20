<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votante', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 200);
            $table->string('apellido', 200);
            $table->string('identificacion', 200)->unique('identificacion');
            $table->string('email', 200)->unique('email');
            $table->string('telefono', 200);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votante');
    }
}
