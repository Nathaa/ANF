<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('descripcion');

            $table->unsignedBigInteger('horizontales_id')->unsigned();
            $table->foreign('horizontales_id')->references('id')->on('horizontales')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('verticales_id')->unsigned();
            $table->foreign('verticales_id')->references('id')->on('verticales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('analisis');
    }
}
