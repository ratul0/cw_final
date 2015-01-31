@include('includes.header')
<body>
<div id="header">
    <div class="container">
    @include('includes.navBar')
        
    </div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            @include('includes.sideBar')

            <div class="span9">
                
                    @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
@include('includes.footer')


</body>

</html>


