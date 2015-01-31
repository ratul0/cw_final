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
	Route::get('product/category/{id}',['as'=> 'products.category.show','uses'=>'ProductsController@singleCategoryProduct']);
	Route::get('product/subcategory/{id}',['as'=> 'products.subcategory.show','uses'=>'ProductsController@singleSubCategoryProduct']);



});



Route::group(['before'=> 'seller'],function(){


	Route::get('products/create', array('as' => 'products.create', 'uses' => 'ProductsController@create'));
	Route::post('products/create', array('as' => 'products.store', 'uses' => 'ProductsController@store'));
	Route::get('products/edit/{id}', array('as' => 'products.edit', 'uses' => 'ProductsController@edit'));
	Route::put('products/edit/{id}', array('as' => 'products.update', 'uses' => 'ProductsController@update'));
	Route::delete('products/{id}', array('as' => 'products.delete', 'uses' => 'ProductsController@deleteSubject'));
	Route::get('order/show',['as'=> 'order.show','uses'=>'OrderController@getOrderForSeller']);


	Route::get('order/approve/{id}',['as'=> 'order.approve','uses'=>'OrderController@approve']);
	Route::get('order/cancel/{id}',['as'=> 'order.cancel','uses'=>'OrderController@cancel']);


	Route::get('products/category/subcategory',['as'=> 'products.category.subcategory','uses'=>'ProductsController@getSubCategories']);
	Route::get('products/category/subcategory/fields',['as'=> 'products.category.subcategory.fields','uses'=>'ProductsController@getFields']);
});


Route::group(['before'=> 'buyer'],function(){
	Route::get('cart',['as'=> 'cart.show','uses'=>'CartController@index']);
	Route::post('addtocart',['as'=> 'cart.doAdd','uses'=>'CartController@store']);

	Route::get('order/view',['as'=> 'order.view','uses'=>'OrderController@view']);
	Route::get('order/store',['as'=> 'order.store','uses'=>'OrderController@store']);

	Route::get('wishlist/add/{id}',['as'=> 'wishlist.add','uses'=>'WishlistController@add']);
	Route::get('wishlist/view',['as'=> 'wishlist.view','uses'=>'WishlistController@view']);


	Route::get('seller/profile/{id}',['as'=> 'seller.profile','uses'=>'ProductsController@sellerProfileView']);

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



});

