<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparaciones', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('descripcion');
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
        Schema::dropIfExists('comparaciones');
    }
}
