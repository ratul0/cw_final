<!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar" style="line-height:82px;">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="{{route('login')}}"><img  style="max-width:51%;position: relative;left: 27px;"src="themes/images/logo4.png" alt="Bootsshop"/></a>
                <form class="form-inline navbar-search" method="post" action="http://www.bootstrappage.com/view/bootstrapshop/products.html" >
                    <input id="srchFld" class="srchTxt" type="text" />
                    <select class="srchTxt">
                        <option>All</option>
                        <option>CLOTHES </option>
                        <option>FOOD AND BEVERAGES </option>
                        <option>HEALTH & BEAUTY </option>
                        <option>SPORTS & LEISURE </option>
                        <option>BOOKS & ENTERTAINMENTS </option>
                    </select>
                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                </form>
                <ul id="topMenu" class="nav pull-right" style="margin-top: 14px;">
                    <li class=""><a href="special_offer.html">Specials Offer</a></li>
                    <li class=""><a href="normal.html">Delivery</a></li>
                    <li class=""><a href="contact.html">Contact</a></li>
                    @if(!Auth::check())
                        <li class="">
                            <a href="{{ route('login') }}" role="button" ><span class="btn btn-large btn-success">Login</span></a>
                        </li>
                    @endif

                    @if(Auth::check())
                        <li class="">
                            <a href="{{ route('logout') }}" role="button" ><span class="btn btn-large btn-danger">Logout</span></a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>