<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWishListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wish_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('user_id')->unsigned();


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
		Schema::drop('wish_list');
	}

}
