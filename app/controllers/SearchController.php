<?php

class SearchController extends \BaseController {

	public function result()
	{

		$key = Input::get('key');
		$products = Product::where('name', 'LIKE', '%'.$key.'%')->orwhere('description', 'LIKE', '%'.$key.'%')->paginate(10);
	

		return View::make('search.show')
					->with('title','Search')->with('products', $products);
	}


}