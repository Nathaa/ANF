<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('nombre');
            $table->float('monto');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->timestamps();

            $table->unsignedBigInteger('cuentas_id')->unsigned();
            $table->foreign('cuentas_id')->references('id')->on('cuentas')->onUpdate('cascade')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
