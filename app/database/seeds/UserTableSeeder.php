<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$users = [
					[

								'email'      => 'seller@cw.com',
								'full_name' =>  'Abu Shariar Ratul',
								'mobile'    =>  '+8801683501282',
								'password'   => Hash::make('seller'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					],
					[

								'email'      => 'buyer@cw.com',
								'full_name' =>  'Don Saimon ',
								'mobile'    =>  '+8801683506582',
								'password'   => Hash::make('buyer'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]

		];

		DB::table('users')->insert($users);

		foreach(range(3, 20) as $index)
		{
			User::create([

						'full_name' =>  $faker->firstName. $faker->lastName,
						'mobile'    =>  $faker->phoneNumber,
						'email' => $faker->email,
						'password' 	=> Hash::make('u'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')


			]);




		}
	}

}