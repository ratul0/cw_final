<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInfoProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('info_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->string('value');
			$table->integer('product_id')->unsigned();
			$table->integer('sub_category_id')->unsigned();
			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')
						->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('sub_category_id')->references('id')->on('sub_categories')
						->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('info_product');
	}

}
