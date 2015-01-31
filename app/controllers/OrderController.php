<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /order
	 *
	 * @return Response
	 */
	public function view()
	{
		$orders = DB::table('order_items')
					->join('orders','orders.id','=','order_items.order_id')
					->where('buyer_id',Auth::user()->id)
					->get();


		return View::make('order.buyer')
					->with('title','Order')->with('orders', $orders);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /order/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /order
	 *
	 * @return Response
	 */
	public function store()
	{
		$carts = Cart::where('user_id', Auth::user()->id)->get();
		$cart_delete = Cart::where('user_id', Auth::user()->id)->get()->lists('id');
		$order = new Order;
		$order->buyer_id= Auth::user()->id;

		$order->rating_status=0;
		$total = 0;
		foreach($carts as $cart){
			$total +=$cart->price;
		}
		$order->total_price=$total;
		if($total>0){
			$order->save();


			foreach($carts as $cart){
				$order_items = new OrderItems;
				$order_items->order_id= $order->id;
				$order_items->product_id = $cart->product_id;
				$order_items->order_status=0;
				$order_items->quantity = $cart->quantity;
				$order_items->item_price = $cart->price;
				$order_items->save();


			}

			if(Cart::destroy($cart_delete)){
				foreach($carts as $product_minus){
					$update = Product::find($product_minus->product_id);
					$update->quantity = $update->quantity-$product_minus->quantity;
					$update->save();
				}
				return Redirect::route('order.view');
			};
		}else{
			return Redirect::route('products.index');
		}


	}

	/**
	 * Display the specified resource.
	 * GET /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /order/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /order/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public  function getOrderForSeller(){
		 $orders = DB::table('orders')
					->join('order_items','order_items.id','=','orders.id')
					->join('products','products.id','=','order_items.product_id')
					->where('user_id',Auth::user()->id)
					->select('order_items.id','buyer_id','total_price','name','description','price','order_items.created_at','order_items.quantity','order_status')
					->get();
		return View::make('order.seller')
					->with('orders',$orders);
	}


	public function cancel($id){
		if(OrderItems::find($id)->delete()){
			return Redirect::route('order.show');
		}else{
			return Redirect::back()->with('error',"Something Went Wrong.");
		}

	}

	public function approve($id){
		$approve = OrderItems::find($id);
		$approve->order_status = 1;
		if($approve->save()){
			return Redirect::route('order.show');
		}else{
			return Redirect::back()->with('error',"Something Went Wrong.");
		}
	}
}