<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$permissions =
					[
								'view_product'   => 'View Product'

					];


		foreach($permissions as $permission_name=>$display_name)
		{
			Permission::create([
						'name'         => $permission_name,
						'display_name' => $display_name
			]);
		}
	}

}