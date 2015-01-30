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

	Route::get('user/profile',['as'=> 'user.profile.show','uses'=>'UserController@profile']);
	Route::get('user/profile/update',['as'=> 'user.profile.update','uses'=>'UserController@profileUpdate']);
	Route::put('user/profile',['as'=> 'user.doProfile','uses'=>'UserController@doProfile']);


	/*UserController*/


	Route::get('products/categories/{id}',['as'=> 'categories.show','uses'=>'ProductsController@profile']);
	Route::get('products/subcategories/{id}',['as'=> 'categories.show','uses'=>'ProductsController@profile']);
	Route::get('products/{id}',['as'=> 'categories.show','uses'=>'ProductsController@profile']);



});



Route::group(['before'=> 'seller'],function(){

	Route::resource('products', 'ProductsController');
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

	return CustomHelper::getAllCategories();
	//return SubCategory::with('category')->whereCategoryId(2)->get();
	//return Category::lists('name','id');

	/*$data = ['name' => 'test'];

	Mail::send('emails.welcome', $data, function($message)
	{

		$message->to('ratulcse27@gmail.com')->subject('Welcome!');
	});*/


});

