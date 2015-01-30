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
								'price'=>'required|numeric',
								'quantity'=>'required|numeric',
								'image1' => 'required',
								'image2' => 'required',
								'image3' => 'required'


					],
					$merge
		);
	}

	public function infoProducts(){
		return $this->hasMany('InfoProduct','product_id','id');
	}

}