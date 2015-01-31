@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <h3>  SHOPPING CART [ <small>{{count($carts)}} Item(s) </small>]<a href="{{route('products.index')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
	<hr class="soft"/>
	
	</table>		
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
				  <th>Price</th>
       
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
              <?php $total = 0;?>
                @foreach($carts as $cart)
                <tr>

                      <!-- cart image thumbs will go under the img bellow -->

                  <td>
                      <img width="60" src="{{asset(ProductImages::whereProductId($cart->product_id)->first()->image_url)}}" alt=""/>
                  </td>

                    <td>{{Product::where('id',$cart->product_id)->first()->description}}<br/>
                        @foreach(InfoProduct::whereProductId($cart->product_id)->get() as $key)
                            <b>{{$key->key}}:{{$key->value}}</b>
                        @endforeach
                    </td> <!-- product description -->
				  <td>
						<div class=""><div class="span1" style="max-width:34px">{{$cart->quantity}}</div>
                    </td>

                  <td>{{$cart->price}}</td>
            
                  <td>{{$cart->price*$cart->quantity}}</td>
                    <?php $total += $cart->price*$cart->quantity;?>
                </tr>
                @endforeach

				

				 <tr>
                  <td colspan="4" style="text-align:right"><strong>TOTAL  =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> {{$total}} </strong></td>
                </tr>
				</tbody>
            </table>
            @if(count($carts))
                <a href="{{route('order.store')}}" class="btn btn-large pull-right btn-success">Checkout<i class="icon-arrow-right"></i></a></h3>
            @endif
@stop