<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratios', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('nombre');
            $table->string('monto');
            $table->string('descripcion');

            $table->unsignedBigInteger('tiporatios_id')->unsigned();
            $table->foreign('tiporatios_id')->references('id')->on('tiporatios')->onUpdate('cascade')->onDelete('cascade');

           
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
        Schema::dropIfExists('ratios');
    }
}
