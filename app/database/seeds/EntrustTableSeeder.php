<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$buyer = Role::find(1);
		$seller = Role::find(2);

		$view_product = Permission::find(1);

		$buyer->attachPermission($view_product);
		$seller->attachPermission($view_product);

		$user1 = User::find(1);
		$user2 = User::find(2);

		$user1->attachRole($seller);
		$user2->attachRole($buyer);

		for($i=4;$i<=20;$i++){
			$user_ids[] = $i;
		}


		$userfaker = User::whereIn('id',$user_ids)->get();

		foreach($userfaker as $userf){
			$userf->attachRole($buyer);

		}


	}

}