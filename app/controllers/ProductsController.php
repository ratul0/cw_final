<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate(15);
		//return ($products->links());

		return View::make('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{



		return View::make('products.create')
					->with('category',Category::lists('name','id'));
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		//return Input::all();


		$validator = Validator::make($data = Input::all(), Product::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product = new Product;
		$product->name = $data['name'];
		$product->description = $data['description'];
		$product->price = $data['price'];
		$product->quantity = $data['quantity'];
		$product->user_id = Auth::user()->id;
		$product->category_id = $data['category_id'];
		$product->sub_category_id = $data['sub_category_id'];
		$getKeys = SubCategoryMeta::where('sub_category_id',$data['sub_category_id'])->get(['key']);








		if($product->save()){
			foreach($getKeys as $key){
				$infoProduct = new InfoProduct;
				$infoProduct->key = $key->key;
				$infoProduct->value = $data[$key->key];
				$infoProduct->product_id = $product->id;
				$infoProduct->sub_category_id = $data['sub_category_id'];
				$infoProduct->save();
			}
			if($data['image1'] != null && $data['image2'] != null && $data['image3'] != null)
			{
				for($i = 1 ; $i <= 3; $i++){
					$file = Input::file('image'.$i);
					$imageName = $file->getClientOriginalName();
					$imageRelativePath = 'images/'.$product->id.'/';
					$imagePath = public_path($imageRelativePath);
					File::exists($imagePath) or File::makeDirectory($imagePath);
					$image = Image::make($file->getRealPath());
					$path = 'image'.$i.'.'.$file->getClientOriginalExtension();
					if($image->resize(160,160)->save($imagePath.$path))
					{
						$product_image = new ProductImages;
						$product_image->product_id = $product->id;
						$product_image->image_url = $imageRelativePath.$path;
						$product_image->save();
					}
				}


				/*$file = Input::file('image2');
				$imageName = $file->getClientOriginalName();
				$imageRelativePath = 'images/'.$data['product_id'].'/';
				$imagePath = public_path($imageRelativePath);
				File::exists($imagePath) or File::makeDirectory($imagePath);
				$image = Image::make($file->getRealPath());
				$path = 'image2.'.$file->getClientOriginalExtension();
				if($image->resize(160,160)->save($imagePath.$path)){
					$product_image = new ProductImages;
					$product_image->product_id = $data['product_id'];
					$product_image->image_url = $imageRelativePath.$path;
					$product_image->save();
				}

				$file = Input::file('image3');
				$imageName = $file->getClientOriginalName();
				$imageRelativePath = 'images/'.$data['product_id'].'/';
				$imagePath = public_path($imageRelativePath);
				File::exists($imagePath) or File::makeDirectory($imagePath);
				$image = Image::make($file->getRealPath());
				$path = 'image3.'.$file->getClientOriginalExtension();
				if($image->resize(160,160)->save($imagePath.$path)){
					$product_image = new ProductImages;
					$product_image->product_id = $data['product_id'];
					$product_image->image_url = $imageRelativePath.$path;
					$product_image->save();
				}*/
				//return ;
			}
			return Redirect::route('products.index');
		}else{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}
	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		return View::make('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		return View::make('products.edit', compact('product'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return Redirect::route('products.index');
	}
	public function getSubCategories(){
		//return Input::get('id');
		$subCategories = SubCategory::whereCategoryId(Input::get('id'))->get();

		return View::make('ajax.afterCategorySelect')->with('subCategories',$subCategories);

	}
	public function getFields(){
		//return Input::get('id');
		$fields = SubCategoryMeta::where('sub_category_id',Input::get('id'))->get();

		return View::make('ajax.afterSubCategorySelect')->with('fields',$fields);

	}


	public function singleProduct($id){
		try{
			$product = Product::findOrFail($id);
			$image_urls = ProductImages::where('product_id',$product->id)->get();

			$product_info = InfoProduct::where('product_id',$product->id)->get();

			return View::make('products.singleShow')
						->with('product',$product)
						->with('image_urls',$image_urls)
						->with('product_info',$product_info);
		}catch (Exception $e){
			return Redirect::route('products.index')->with('error','Requested Page not exists.');
		}
	}


	public function singleCategoryProduct($id){
		try{
			$products = Product::where('category_id',$id)->paginate(15);
			return View::make('products.index', compact('products'));
		}catch (Exception $e){
			return Redirect::route('products.index')->with('error','Requested Page not exists.');
		}
	}

	public function singleSubCategoryProduct($id){
		try{
			$products = Product::where('sub_category_id',$id)->paginate(15);
			return View::make('products.index', compact('products'));
		}catch (Exception $e){
			return Redirect::route('products.index')->with('error','Requested Page not exists.');
		}
	}

	public function sellerProfileView($id){

		$products = Product::where('user_id',$id)->get();
		return Redirect::route('products.index')
					->with('products',$products);
	}

}
