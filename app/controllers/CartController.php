<?php

class CartController extends \BaseController {

	public function index(){
		$carts = Cart::where('user_id', Auth::user()->id)->get();

		return View::make('cart.show')
					->with('title','Cart')->with('carts', $carts);
	}

	public function store(){
		$validator = Validator::make($data = Input::all(), Cart::rules());
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if($data['quantity']>Product::find($data['product_id'])->quantity){
			return Redirect::back()->with('error','Product not Available for this Quantity.');
		}
		$cart = new Cart;
		$cart->quantity = $data['quantity'];
		$cart->user_id = Auth::user()->id;
		$cart->product_id = $data['product_id'];
		$cart->price = $data['product_price']*$data['quantity'];

		if(Cart::where('product_id',$data['product_id'])->where('user_id',Auth::user()->id)->first()!= NULL){
			return Redirect::back()->with('error','Product Already Added.');
		}

		if($cart->save()){
			return Redirect::route('cart.show');
		}else{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

}