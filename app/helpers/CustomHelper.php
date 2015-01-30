<?php

	class CustomHelper
	{

		public static function getAllCategories()
		{
			$category = Category::with('subCategories')->get();
			return $category;
		}
	}
