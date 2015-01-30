@extends('layouts.default')

@section('content')
    @include('includes.alert')
    
    <div class="row">	  
		<div id="gallery" class="span5">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
  </div>

  <!-- Left and right controls -->
  
    
  </a>
</div>
			<div id="differentview" class="moreOptopm carousel slide">
                
               
			 
			  
              </div>
			  
			 
			</div>
			<div class="span4">
				 
				
				 
			</div>
			
			<div class="span9">
             
            
             
		<div class="tab-pane" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane active" id="listView">
				
				@foreach($products as $product)
				<div class="row">	  
					<div class="span2">
						<img src="themes/images/products/4.jpg" alt=""/>
					</div>
					<div class="span4">
						<h3>{{$product->name}}</h3>				
						<hr class="soft"/>
						<p>
						{{Str::limit($product->description, 100) }}
						</p>
						<a class="btn btn-small pull-right" href="{{route('product.show',$product->id)}}">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
						<form class="form-horizontal qtyFrm">
							<h3>{{$product->price}}/=</h3>
							
							<div class="btn-group">
							  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
							</div>
						</form>
					</div>
			</div>
			<hr class="soft"/>
			@endforeach
			
			<div class="pagination">{{ $products->links() }}</div>
			
		


			
			<hr class="soft"/>
		</div>
			<div class="tab-pane " id="blockView">
				<ul class="thumbnails">

					@foreach($products as $product)
        			<li class="span3">
					  <div class="thumbnail">
						<a href="{{route('product.show',$product->id)}}"><img src="themes/images/products/10.jpg" alt=""/></a>
						<div class="caption">
						  <h5>{{$product->name}}</h5>
						  <p> 
							{{Str::limit($product->description, 50) }}

						  </p>
						  <h4 style="text-align:center"> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{$product->price}}/=</a></h4>
						</div>
					  </div>
					</li>
    				@endforeach
					
					
				

				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
@stop