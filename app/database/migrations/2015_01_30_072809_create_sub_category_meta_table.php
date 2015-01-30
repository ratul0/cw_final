<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubCategoryMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_category_meta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->integer('sub_category_id')->unsigned();
			$table->timestamps();

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
		Schema::drop('sub_category_meta');
	}

}
