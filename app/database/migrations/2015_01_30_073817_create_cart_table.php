<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('quantity');
			$table->double('price');

			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')
						->onUpdate('cascade')->onDelete('cascade');

			$table->foreign('user_id')->references('id')->on('users')
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
		Schema::drop('cart');
	}

}
