<?php

class DashboardController extends \BaseController {

	public function home(){

		$suggest =  Product::whereIn('sub_category_id' , function($query){
			$query->select('sub_category_id')->from('wish_list')->join('products','products.id','=','wish_list.product_id')
						->where('wish_list.user_id',Auth::user()->id);
		});

		    $suggest1 = $suggest->take(4)->skip(0)->get();
			$suggest2 = $suggest->take(4)->skip(4)->get();
		return View::make('dashboard')
					->with('title','Dashboard')
					->with('suggest1',$suggest1)
					->with('suggest2',$suggest2);
	}

}