<?php

class Category extends \Eloquent {

	protected $table = 'categories';
	protected $fillable = ['name'];
	protected $hidden = [];
	public $timestamps = true;

	public function subCategories(){
		return $this->hasMany('SubCategory','category_id','id');
	}

}