<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyer_id')->unsigned();
			$table->text('shipping_details');
			$table->integer('shipping_status')->default(0);
			$table->integer('order_status')->default(0);
			$table->double('total_price');
			$table->integer('rating_status')->default(0);


			$table->timestamps();

			$table->foreign('buyer_id')->references('id')->on('users')
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
		Schema::drop('orders');
	}

}
