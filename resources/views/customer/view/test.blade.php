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
