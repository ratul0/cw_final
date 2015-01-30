<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		$subCategory = [
					'Electronics' =>['Mobile','Computer','TV'],
					'Property'      =>['House','Flat','Land'],
					'Vehicle'   => ['Bicycle','Car','Motorbike'],
					'Jobs'    =>['Advertisement','Service'],
					'Education'=>['Book','Tuition'],
					'Others'=>['Others']
			];
		$i = 1;
		foreach($subCategory as $category)
		{

			foreach($category as $sub){
				SubCategory::create([
							'name' =>$sub,
							'category_id'=>$i
				]);
			}
			$i++;

		}
	}

}