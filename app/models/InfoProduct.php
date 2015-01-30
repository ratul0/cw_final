<?php

class InfoProduct extends \Eloquent {
	protected $table = 'info_product';

	public $timestamps = true;

	public function product(){
		return $this->belongsTo('Product');
	}
}