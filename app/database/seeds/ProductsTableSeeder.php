<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			$cat = $faker->numberBetween(1,5);
			$subcat = SubCategory::where('category_id', $cat)->get(['id']);
			$id = rand(1, $subcat->count());
			$product = Product::create([

				'user_id' => 1,
				'name' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->numberBetween(10,200),
				'quantity' =>  $faker->numberBetween(10,20),
				'category_id' => $cat,
				'sub_category_id' => $subcat[$id-1]['id']
				
			]);
			$getKeys = SubCategoryMeta::where('sub_category_id',$product->sub_category_id)->get(['key']);
			foreach($getKeys as $key){
				$infoProduct = new InfoProduct;
				$infoProduct->key = $key->key;
				$infoProduct->value =  $faker->name;
				$infoProduct->product_id = $product->id;
				$infoProduct->sub_category_id = $product->sub_category_id;
				$infoProduct->save();
			}
			foreach(range(1,3) as $testindex){
				$product_images = new ProductImages;
				$product_images->product_id = $product->id;
				$product_images->image_url = 'images/none.jpg';
				$product_images->save();
			}




		}
	}

}