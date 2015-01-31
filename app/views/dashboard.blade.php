@extends('layouts.default')

@section('content')
    @include('includes.alert')
    @if(Entrust::hasrole(Config::get('globalRole.seller')))
    <a class="btn btn-large btn-success" href="{{route('products.create')}}">Add Product</a>


    @endif

    @if(Entrust::hasrole(Config::get('globalRole.buyer')))
        <a class="btn btn-large btn-success" href="{{route('order.view')}}">All My Orders</a>
        <a class="btn btn-large btn-info" href="{{route('cart.show')}}">My Cart</a>

        <div class="well well-small">
            <h4>Recommend Products <small class="pull-right"></small></h4>
            <div class="row-fluid">
                <div id="featured" class="carousel slide">
                    <div class="carousel-inner">

                        <div class="item active">
                            <ul class="thumbnails">
                                @foreach($suggest1 as $suggest)
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a href="{{route('product.show',$suggest->id)}}"><img src="{{asset(ProductImages::where('product_id',$suggest->id)->first()->image_url)}}" alt=""></a>
                                        <div class="caption">
                                            <h5>{{$suggest->name}}</h5>
                                            <h4><a class="btn" href="{{route('product.show',$suggest->id)}}">VIEW</a> <span class="pull-right">{{$suggest->price}}</span></h4>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="thumbnails">
                                @foreach($suggest2 as $suggest)
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <a href="{{route('product.show',$suggest->id)}}"><img src="{{asset(ProductImages::where('product_id',$suggest->id)->first()->image_url)}}" alt=""></a>
                                            <div class="caption">
                                                <h5>{{$suggest->name}}</h5>
                                                <h4><a class="btn" href="{{route('product.show',$suggest->id)}}">VIEW</a> <span class="pull-right">{{$suggest->price}}</span></h4>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>



                    </div>
                    <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                </div>
            </div>
        </div>


    @endif
@stop