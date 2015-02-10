<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('articulos', function(Blueprint $table)
        {

            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('cantidad');

            $table->integer('grupos_id')->unsigned();
            $table->foreign('grupos_id')->references('id')->on('grupos')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
