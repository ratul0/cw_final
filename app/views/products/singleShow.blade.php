@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <div class="row">
        <div id="gallery" class="span5">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->


                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $loop=0 ?>
                    @foreach($image_urls as $url)
                        @if($loop == 0)
                                <div class="item active">
                                    <img src="{{asset($url->image_url)}}" alt="">
                                </div>
                                <?php $loop=1 ?>
                            @else
                        <div class="item">
                            <img src="{{asset($url->image_url)}}" alt="">
                        </div>
                            @endif
                    @endforeach


                </div>

                <!-- Left and right controls -->


                </a>
            </div>
            <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($image_urls as $url)
                        <a href="{{asset($url->image_url)}}"> <img style="width:29%" src="{{asset($url->image_url)}}" alt=""/></a>
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach($image_urls as $url)
                            <a href="{{asset($url->image_url)}}" > <img style="width:29%" src="{{asset($url->image_url)}}" alt=""/></a>
                        @endforeach

                    </div>
                </div>



            </div>


        </div>
        <div class="span4">
            <h3>{{$product->name}}</h3>
            <hr class="soft"/>

                {{Form::open(['route'=>'cart.doAdd', 'method'=> 'post','class'=>'form-horizontal qtyFrm'])}}
                <div class="control-group">
                    <label class="control-label"><span>{{$product->price}}</span></label>
                    <div class="controls">
                        {{Form::number('quantity',null,['class'=>'span1','placeholder'=>'Quantity'])}}
                    </div><br/>
                    {{Form::hidden('product_id',$product->id)}}
                    {{Form::hidden('product_price',$product->price)}}
                    @if($product->quantity>0)
                        {{Form::submit('Add To Cart',['class'=>'btn btn-large btn-primary pull-right'])}}
                    @else

                    @endif
                    <a class="btn btn-large btn-success pull-right" href="{{route('wishlist.add',['id'=>$product->id])}}">Add To WishList</a>

                </div>
            </form>

            <hr class="soft"/>
            @if($product->quantity>0)
                <h4>Currently Available</h4>
            @else
                <h4>Currently Not Available</h4>
            @endif


            <hr class="soft clr"/>
            <p>
                {{$product->description}}
            </p>

            <br class="clr"/>
            <a href="#" name="detail"></a>
            <hr class="soft"/>
        </div>

        <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <h4>Product Information</h4>
                    <table class="table table-bordered">
                        <tbody>
                        <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                        @foreach($product_info as $info)
                        <tr class="techSpecRow"><td>{{$info->key}}: </td><td>{{$info->value}}</td></tr>
                        @endforeach
                        </tbody>
                    </table>


                    <h4>Editorial Reviews</h4>
                    <h5>Manufacturer's Description </h5>
                    <p>
                        With a generous 18x Fujinon optical zoom lens, the S2950 really packs a punch, especially when matched with its 14 megapixel sensor, large 3.0" LCD screen and 720p HD (30fps) movie capture.
                    </p>


                </div>
                <div class="tab-pane fade" id="profile">
                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr"/>
                    <hr class="soft"/>
                    <div class="tab-content">
                        <div class="tab-pane" id="listView">
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/4.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox"/>  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/5.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/6.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/7.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <hr class="soft"/>
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/8.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                            <div class="row">
                                <div class="span2">
                                    <img src="themes/images/products/9.jpg" alt=""/>
                                </div>
                                <div class="span4">
                                    <h3>New | Available</h3>
                                    <hr class="soft"/>
                                    <h5>Product Name </h5>
                                    <p>
                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies -
                                        that is why our goods are so popular..
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> $222.00</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                        </div>
                        <div class="tab-pane active" id="blockView">
                            <ul class="thumbnails">
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a href="product_details.html"><img src="themes/images/products/10.jpg" alt=""/></a>
                                        <div class="caption">
                                            <h5>Manicure &amp; Pedicure</h5>
                                            <p>
                                                Lorem Ipsum is simply dummy text.
                                            </p>
                                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                        </div>
                                    </div>
                                </li>


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