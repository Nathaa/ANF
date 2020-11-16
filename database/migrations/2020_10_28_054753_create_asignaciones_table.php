<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->unsignedBigInteger('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('analisis_id')->unsigned();
            $table->foreign('analisis_id')->references('id')->on('analisis')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ratios_id')->unsigned();
            $table->foreign('ratios_id')->references('id')->on('ratios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('asignaciones');
    }
}
