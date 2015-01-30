<?php

class SubCategory extends \Eloquent {

	protected $table = 'sub_categories';
	protected $fillable = ['name','category_id'];
	protected $hidden = [];
	public $timestamps = true;

	public function category(){
		return $this->belongsTo('Category');
	}

}