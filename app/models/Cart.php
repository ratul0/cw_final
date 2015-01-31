<?php

class Cart extends \Eloquent {
	protected $table = 'cart';

	public $timestamps = true;



	public static function rules($id=0,$merge=[] ){
		return array_merge(
					[
								'quantity' => 'required|numeric'


					],
					$merge
		);
	}
}