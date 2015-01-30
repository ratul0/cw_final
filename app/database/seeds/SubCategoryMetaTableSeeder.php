<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubCategoryMetaTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$subCategoryMeta = [
			1=>['Brand','Feature'],
			4=>['Room','Square_feet'],
			5=>['Room','Square_feet'],
			6=>['Square_feet'],
			7=>['Brand','Model'],
			8=>['Brand','Model'],
			9=>['Brand','Model'],
			12=>['Publisher','Writer'],
		];



		foreach($subCategoryMeta as $key=>$subCategoryId)
		{

			foreach($subCategoryId as $meta){
				SubCategoryMeta::create([
					'key'=>$meta,
					'sub_category_id'=>$key
				]);
			}


		}
	}

}