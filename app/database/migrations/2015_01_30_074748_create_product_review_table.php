<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_review', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyer_id')->unsigned();
			$table->integer('rating');
			$table->text('review');
			$table->integer('product_id')->unsigned();
			$table->timestamps();
			$table->foreign('buyer_id')->references('id')->on('users')
						->onUpdate('cascade')->onDelete('cascade');

			$table->foreign('product_id')->references('id')->on('products')
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
		Schema::drop('product_review');
	}

}
