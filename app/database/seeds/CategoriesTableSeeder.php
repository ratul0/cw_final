<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$category = ['Electronics','Property','Vehicle','Jobs','Education','Others'];

		foreach(range(0, 5) as $index)
		{
			Category::create([
						'name' => $category[$index]
			]);
		}
	}

}