<?php



Route::get('/',['as'=> 'home','uses'=> function(){
	return View::make('home');
}]);




/*before Login*/
Route::group(['before'=>'guest'],function(){
	/*AuthController*/
	Route::get('login',['as'=> 'login','uses'=>'AuthController@login']);
	Route::post('login',['as'=> 'doLogin','uses'=>'AuthController@doLogin']);


	Route::get('register',['as'=> 'register','uses'=>'AuthController@register']);
	Route::post('register',['as'=> 'doRegister','uses'=>'AuthController@doRegister']);
	/*AuthController*/
});

/*For All Logged In Users*/
Route::group(['before'=>'auth'],function(){
	/*AuthController*/
	Route::get('logout',['as'=> 'logout','uses'=>'AuthController@logout']);
	/*AuthController*/

	/*DashboardController*/
	Route::get('dashboard',['as'=> 'dashboard','uses'=>'DashboardController@home']);
	/*DashboardController*/

	/*UserController*/

	Route::get('profile',['as'=> 'user.profile.show','uses'=>'UserController@profile']);
	Route::get('user/profile/update',['as'=> 'user.profile.update','uses'=>'UserController@profileUpdate']);
	Route::put('user/profile',['as'=> 'user.updateProfile','uses'=>'UserController@updateProfile']);


	/*UserController*/




	Route::get('products', array('as' => 'products.index', 'uses' => 'ProductsController@index'));
	Route::get('product/{id}',['as'=> 'product.show','uses'=>'ProductsController@singleProduct']);
	Route::get('products/category/{id}',['as'=> 'products.category.show','uses'=>'ProductsController@singleCategoryProduct']);
	Route::get('products/subcategory/{id}',['as'=> 'products.subcategory.show','uses'=>'ProductsController@singleSubCategoryProduct']);



});



Route::group(['before'=> 'seller'],function(){


	Route::get('products/create', array('as' => 'products.create', 'uses' => 'ProductsController@create'));
	Route::post('products/create', array('as' => 'products.store', 'uses' => 'ProductsController@store'));
	Route::get('products/edit/{id}', array('as' => 'products.edit', 'uses' => 'ProductsController@edit'));
	Route::put('products/edit/{id}', array('as' => 'products.update', 'uses' => 'ProductsController@update'));
	Route::delete('products/{id}', array('as' => 'products.delete', 'uses' => 'ProductsController@deleteSubject'));


	Route::get('products/category/subcategory',['as'=> 'products.category.subcategory','uses'=>'ProductsController@getSubCategories']);
	Route::get('products/category/subcategory/fields',['as'=> 'products.category.subcategory.fields','uses'=>'ProductsController@getFields']);
});


Route::group(['before'=> 'buyer'],function(){


});

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/test', function()
{

	return ProductImages::where('product_id',1)->first()->image_url;
	//return SubCategory::with('category')->whereCategoryId(2)->get();
	//return Category::lists('name','id');

	/*$data = ['name' => 'test'];

	Mail::send('emails.welcome', $data, function($message)
	{

		$message->to('ratulcse27@gmail.com')->subject('Welcome!');
	});*/


});

