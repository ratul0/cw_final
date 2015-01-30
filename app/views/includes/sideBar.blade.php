<!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">

                    @foreach(Config::get('globalVariables.categories') as $category)
                        <li class="subMenu"><a> {{$category->name}}</a>
                            <ul style="display:none">
                                @foreach($category->sub_categories as $sub_category)
                                <li><a href="products.html"><i class="icon-chevron-right"></i>{{$sub_category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                    @endforeach



                </ul>
                <br/>


            </div>
            <!-- Sidebar end=============================================== -->