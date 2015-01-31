<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar" style="line-height:82px;">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-inner">
        <a class="brand" href="{{route('home')}}"><img  style="max-width:51%;position: relative;left: 27px;"src="{{ URL::asset('themes/images/logo4.png') }}" alt="Bootsshop"/></a>

        <form class="form-inline navbar-search" method="post" action="{{route('productsearch.show')}}" >
            <input id="srchFld" name="key" class="srchTxt" type="text" placeholder="Type any keyword" />

            <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
        </form>
        <ul id="topMenu" class="nav pull-right" style="margin-top: 14px;">

            @if(Auth::check())

                <li class="">
                <li class=""><a href="{{route('dashboard')}}">My Dashboard</a></li>
                </li>

                <li class="">
                <li class=""><a href="{{route('user.profile.show')}}">My Profile</a></li>
                </li>
            @endif

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