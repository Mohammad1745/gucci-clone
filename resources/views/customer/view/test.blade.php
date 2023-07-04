@extends('customer.layouts.customer')
@section('content')

    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    </div>
    <!-- banner bg main end -->
    @foreach($categories as $category)
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">{{$category->name}}</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    {{$count=1}}
                                    @foreach($products as $product)
                                        @if($category->id==$product->category_id)
                                            @if($count<=3)
                                                <div class="col-lg-4 col-sm-4">
                                                    <div class="box_main">
                                                        <h4 class="shirt_text">{{$product->name}}</h4>
                                                        <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                                        <div class="tshirt_img"><img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/></div>
                                                        <div class="btn_main">
                                                            <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                            <div class="seemore_bt"><a href="#">See More</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{$count++}}
                                            @endif
                                        @endif


                                    @endforeach


                            </div>
                        </div>
                    </div>
                    @if($category->product_count>3)
                        <div class="carousel-item ">
                            <div class="container">
                                <h1 class="fashion_taital">{{$category->name}}</h1>
                                <div class="fashion_section_2">
                                    <div class="row">

                                        @foreach($products as $product)
                                            @if($category->id==$product->category_id)
                                                @if($count<=6)
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="box_main">
                                                            <h4 class="shirt_text">{{$product->name}}</h4>
                                                            <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                                            <div class="tshirt_img"><img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/></div>
                                                            <div class="btn_main">
                                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                                <div class="seemore_bt"><a href="#">See More</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{$count++}}
                                                @endif
                                            @endif


                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container">
                                <h1 class="fashion_taital">{{$category->name}}</h1>
                                <div class="fashion_section_2">
                                    <div class="row">

                                        @foreach($products as $product)
                                            @if($category->id==$product->category_id)
                                                @if($count<=9)
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="box_main">
                                                            <h4 class="shirt_text">{{$product->name}}</h4>
                                                            <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                                            <div class="tshirt_img"><img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/></div>
                                                            <div class="btn_main">
                                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                                <div class="seemore_bt"><a href="#">See More</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{$count++}}
                                                @endif
                                            @endif


                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

    @endforeach
    <!-- fashion section start -->
@endsection

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Subcategory
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($subCategories as $subCategory)
                        <a class="dropdown-item" href="{{route('subCategoryPage',[$category->name,$subCategory->name,$subCategory->id])}}" data-toggle="dropdown">{{$subCategory->name}}
                        </a>
                    @endforeach

                </div>
            </div>


            <style>
                .gradient-custom {
                    /* fallback for old browsers */
                    background:#508bfc ;

                    /* Chrome 10-25, Safari 5.1-6 */
                    background: #508bfc;

                    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    background: #508bfc
                }

                .card-registration .select-input.form-control[readonly]:not([disabled]) {
                    font-size: 1rem;
                    line-height: 2.15;
                    padding-left: .75em;
                    padding-right: .75em;
                }
                .card-registration .select-arrow {
                    top: 13px;
                }
            </style>
            <section class="vh-70" style="background-color: #eee;">
                <div class="container h-70" style="padding: 20px;">
                    <div class="row d-flex justify-content-center align-items-center h-70">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                            <form class="mx-1 mx-md-4" action="{{route('processRegistration')}}"  method="post">
                                                @csrf
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <div class="form-outline flex-fill mb-0 border-black">
                                                        <input name="name" type="text" id="firstName" class="form-control form-control-lg" />
                                                        <label class="form-label" for="firstName">Name</label>
                                                    </div>

                                                </div>
                                                @if (isset($errors) && $errors->has('name'))
                                                    <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
                                                @endif
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input name="email"type="email" id="emailAddress" class="form-control form-control-lg" />
                                                        <label class="form-label" for="emailAddress">Email</label>
                                                    </div>

                                                </div>
                                                @if (isset($errors) && $errors->has('email'))
                                                    <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                                                @endif
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input name="number"type="tel" id="phoneNumber" class="form-control form-control-lg" />
                                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    </div>
                                                </div>
                                                @if (isset($errors) && $errors->has('number'))
                                                    <span class="text-danger"><strong>{{ $errors->first('number') }}</strong></span>
                                                @endif
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input name="password"type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                                    </div>

                                                </div>
                                                @if (isset($errors) && $errors->has('password'))
                                                    <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                                                @endif
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input name="confirm_password"type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                                        <label class="form-label" for="typePasswordX-2">Confirm Password</label>
                                                    </div>

                                                </div>
                                                @if (isset($errors) && $errors->has('confirm_password'))
                                                    <span class="text-danger"><strong>{{ $errors->first('confirm_password') }}</strong></span>
                                                @endif
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                                </div>
                                                <div class="text-center">
                                                    <p>Already  have an account? <a  href="{{route('login')}}">sign In</a></p>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
