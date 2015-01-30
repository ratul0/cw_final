<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellerReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seller_review', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyer_id')->unsigned();
			$table->integer('seller_id')->unsigned();
			$table->integer('rating');
			$table->timestamps();

			$table->foreign('buyer_id')->references('id')->on('users')
						->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('seller_id')->references('id')->on('users')
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
		Schema::drop('seller_review');
	}

}
