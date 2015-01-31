<!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                @if(Entrust::hasRole(Config::get('globalRole.seller')))
                        <div class="well well-small"><a id="myCart" href="{{route('order.show')}}"><img src="{{asset('themes/images/ico-cart.png')}}" alt="cart">Orders </a></div>

                    @elseif(Entrust::hasRole(Config::get('globalRole.buyer')))
                        <div class="well well-small"><a id="myCart" href="{{route('cart.show')}}"><img src="{{asset('themes/images/ico-cart.png')}}" alt="cart">My Cart </a></div>
                    @endif
                <ul id="sideManu" class="nav nav-tabs nav-stacked">

                    @foreach(Config::get('globalVariables.categories') as $category)
                        <li class="subMenu"><a> {{$category->name}}</a>
                            <ul style="display:none">
                                @foreach($category->sub_categories as $sub_category)
                                <li><a href="{{route('products.subcategory.show',['id'=>$sub_category->id])}}"><i class="icon-chevron-right"></i>{{$sub_category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                    @endforeach



                </ul>
                <br/>


            </div>
            <!-- Sidebar end=============================================== -->