<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditarTablaAsistentesAgregarCampoAsistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asistentes', function (Blueprint $table) {
            $table->boolean('asistencia')->nullable()->after('region_id');

            $table->index(['tipo_asistente']);
            $table->index(['nombre']);
            $table->index(['puesto_id']);
            $table->index(['otro_puesto']);
            $table->index(['email']);
            $table->index(['region_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asistentes', function (Blueprint $table) {
            $table->dropIndex(['tipo_asistente']);
            $table->dropIndex(['nombre']);
            $table->dropIndex(['puesto_id']);
            $table->dropIndex(['otro_puesto']);
            $table->dropIndex(['email']);
            $table->dropIndex(['region_id']);

            $table->dropColumn('asistencia');
        });
    }
}
