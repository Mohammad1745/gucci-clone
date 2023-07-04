<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/css/customer/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/css/customer/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/css/customer/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/img/customer/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/css/customer/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/customer/owl.carousel.min.css">
    <link rel="stylesoeet" href="/css/customer/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style>

        #divMenu, ul, li, li li {
            margin: 0;
            padding: 0;
        }

        #divMenu {
            width: 150px;
            height: 27px;
        }

        #divMenu ul
        {
            line-height: 25px;
        }

        #divMenu li {
            list-style: none;
            position: relative;
            background: #545b62;
        }

        #divMenu li li {
            list-style: none;
            position: relative;
            background: #545b62;
            left: 148px;
            top: -27px;
        }


        #divMenu ul li a {
            width: 148px;
            height: 25px;
            display: block;
            text-decoration: none;
            text-align: center;
            font-family: Georgia,'Times New Roman',serif;
            color:#ffffff;
            border:1px solid #eee;
        }

        #divMenu ul ul {
            position: absolute;
            visibility: hidden;
            top: 27px;
        }

        #divMenu ul li:hover ul {
            visibility: visible;
        }

        #divMenu li:hover {
            background-color: #945c7d;
        }

        #divMenu ul li:hover ul li a:hover {
            background-color: #945c7d;
        }

        #divMenu a:hover {
            font-weight: bold;
        }
        .dropdown-item {
            position: relative;
        }

        .dropdown-item .sub-menu {
            position: absolute;
            top: 0;
            right: -100%;
            min-width: 10rem;
        }

        .dropdown-item:hover .sub-menu {
            display: block;
        }

    </style>
</head>
<body>
<!-- banner bg main start -->
<div class="banner_bg_main" style="padding-bottom: 5px">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('bestSells')}}">Best Sellers</a></li>
                            <li><a href="{{route('newRelease')}}">New Releases</a></li>
                            <li><a href="#">Today's Deals</a></li>
                            <li><a href="{{route('customerService')}}">Customer Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo"><a href="index.html"><img src="/img/customer/logo.png"></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="{{route('home')}}">Home</a>
                    @foreach($categories as $category)
                        <a  href="{{route('categoryPage',[$category->id,$category->slug])}}">{{ucfirst($category->name)}}</a>
                    @endforeach
                </div>
                <span class="toggle_icon" onclick="openNav()"><img src="/img/customer/toggle-icon.png"></span>
                <!--start dropdown for category-->

                <!-- end dropdown for category-->
<!-- from here -->





                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Products
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background: transparent;">

                        <div id="divMenu">
                            <ul>
                                @foreach($categories as $category)
                                <li><a  href="{{route('categoryPage',[$category->id,$category->slug])}}">{{ucfirst($category->name)}}</a>
                                    <ul>
                                        @foreach($subCategories as $subCategory)
                                            @if($category->id==$subCategory->category_id)

                                            <li>
                                                <a href="{{route('subCategoryPage',[$subCategory->id,$category->name,$subCategory->name,])}}">{{$subCategory->name}}</a>
                                            </li>

                                            @endif
                                        @endforeach

                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


<!-- end here -->


                <div class="main">
                    <!-- Another variation with a button -->
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input  name="description" type="text" class="form-control" placeholder="Search this blog">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="header_box">
                    <div class="login_menu">
                        <ul>
                            <li>
                                <a href="{{route('addToCardPage')}}">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                                    <span class="padding_10">Cart</span></a>
                            </li>
                            <li>@if(Auth::user())
                                    <a href="{{route('userProfile')}}">
                                        <i class="fa fa-user" aria-hidden="true"></i><span class="padding_10">Profile</span>
                                    </a>
                                @else
                                    <a  href="{{route("login")}}">
                                        <i class="fa fa-user" aria-hidden="true"></i><span class="padding_10">Login</span>
                                    </a>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
@yield('view.admin.partials.alert')
@yield('content')
<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><a href="index.html"><img src="/img/customer/footer-logo.png"></a></div>
        <div class="input_bt">
            <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
            <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
        </div>
        <div class="footer_menu">
            <ul>
                <li><a href="#">Best Sellers</a></li>
                <li><a href="#">Gift Ideas</a></li>
                <li><a href="#">New Releases</a></li>
                <li><a href="#">Today's Deals</a></li>
                <li><a href="#">Customer Service</a></li>
            </ul>
        </div>
        <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
    </div>
</div>
<!-- footer section end -->
<!-- Javascript files-->
<script src="{{ asset('js/customer/jquery.min.js') }}"></script>
<script src="{{ asset('js/customer/popper.min.js') }}"></script>
<script src="{{ asset('js/customer/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/customer/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/customer/plugin.js') }}"></script>

<!-- sidebar -->
<script src="{{ asset('js/customer/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/customer/custom.js') }}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
</div>
</body>
</html>
