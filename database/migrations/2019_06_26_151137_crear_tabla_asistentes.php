<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAsistentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_asistente');
            $table->string('nombre');
            $table->integer('puesto_id')->nullable()->unsigned();
            $table->string('otro_puesto')->nullable();
            $table->string('telefono_oficina')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('email')->nullable();
            $table->integer('municipio_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
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
        Schema::dropIfExists('asistentes');
    }
}
