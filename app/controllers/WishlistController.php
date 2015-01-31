<?php

class WishlistController extends \BaseController {

	public function add($id){

		try{
			Product::findOrFail($id);
			//return WishList::where('product_id',$id)->where('user_id',Auth::user()->id)->get();
			if(WishList::where('product_id',$id)->where('user_id',Auth::user()->id)->first() == null){

				$wishlist = new WishList;
				$wishlist->user_id = Auth::user()->id;
				$wishlist->product_id = $id;
				if($wishlist->save()){
					return Redirect::route('wishlist.view');
				}
			}else{
				return Redirect::route('product.show',['id'=>$id])->with('error','This Product Already Added in Your WishList.');
			}

		}catch(Exception $exception){
			return Redirect::route('products.index')->with('error','This Product is not Available.');
		}

	}

	public function view(){
		$wishlist = DB::table('wish_list')
					->join('products', 'products.id', '=', 'wish_list.product_id')
					->join('users', 'users.id', '=', 'wish_list.user_id')
					->where('wish_list.user_id',Auth::user()->id)
					->select('wish_list.id', 'products.name', 'products.description','product_id')
					->get();



		return View::make('wishlist.show')
					->with('wishlists',$wishlist);
	}

}