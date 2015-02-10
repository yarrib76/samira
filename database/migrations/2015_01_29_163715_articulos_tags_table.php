<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticulosTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('articulos_tagas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->integer('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');

            $table->integer('tags_id')->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');


            $table->unique(['articulo_id', 'tags_id']);




        });
    }

    public function down()
    {
        Schema::drop('articulos_tagas');
    }


}
