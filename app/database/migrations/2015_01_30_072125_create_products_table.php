<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->integer('price_type');
			$table->double('price');
			$table->integer('quantity');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('sub_category_id')->unsigned();
			$table->integer('product_status');


			$table->foreign('user_id')->references('id')->on('users')
						->onUpdate('cascade')->onDelete('cascade');

			$table->foreign('category_id')->references('id')->on('categories')
						->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('sub_category_id')->references('id')->on('sub_categories')
						->onUpdate('cascade')->onDelete('cascade');


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
		Schema::drop('products');
	}

}
