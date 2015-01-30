<?php

class SubCategoryMeta extends \Eloquent {
	protected $table = 'sub_category_meta';
	protected $fillable = ['key','sub_category_id'];
	protected $hidden = [];
	public $timestamps = true;



}