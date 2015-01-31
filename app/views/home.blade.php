@extends('layouts.default')

@section('content')
    @include('includes.alert')
   	<h4>Latest Products </h4>
   	<ul class="thumbnails">

   				@foreach($latest_products as $latest_product)
				<li class="span3">
                                  <div class="thumbnail">
                                    <a href="{{route('product.show',$latest_product->id)}}"><img src="{{asset(ProductImages::where('product_id',$latest_product->id)->first()->image_url)}}" alt=""/></a>
                                    <div class="caption">
                                      <h5>{{$latest_product->name}}</h5>
                                      <p> 
                                        {{Str::limit($latest_product->description, 50) }}

                                      </p>
                                      <h4 style="text-align:center"> <a class="btn" href="{{route('product.show',$latest_product->id)}}">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{$latest_product->price}}/=</a></h4>
                                    </div>
                                  </div>
                                </li>
                 @endforeach
				
			  </ul>
@stop