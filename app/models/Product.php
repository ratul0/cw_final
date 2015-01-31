<?php

class Product extends \Eloquent {

	protected $table = 'products';
	protected $fillable = ['name','description','price','quantity','user_id','category_id','sub_category_id'];
	protected $hidden = [];
	public $timestamps = true;
	public static function rules($id=0,$merge=[] ){
		return array_merge(
					[
								'name' => 'required',
								'price'=>'required|numeric|min:1',
								'quantity'=>'required|numeric|min:1',
								'image1' => 'required',
								'image2' => 'required',
								'image3' => 'required',
								'category_id'=>'required|numeric|min:1',
								'sub_category_id'=>'required|numeric|min:1'



					],
					$merge
		);
	}

	public function infoProducts(){
		return $this->hasMany('InfoProduct','product_id','id');
	}

}