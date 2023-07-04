@extends('customer.layouts.customer')
@section('content')

</div>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">


                        <div class="container">



                            <h1 class="fashion_taital">{{$singleCategorySubCategory->name}}</h1>

                            <div class="fashion_section_2">

                                <div class="row">
                                    @foreach($products as $product)
                                        @if($product->quantity>0)
                                            <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">

                                            <h4 class="shirt_text">{{$product->name}}</h4>
                                            <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/></div>
                                            <div class="buy_bt">
                                                <form action="" method="post">
                                                    @csrf
                                                    <input name="product_name"type="hidden" value="{{$product->name}}">
                                                    <input name="product_id"type="hidden" value="{{$product->id}}">
                                                    <input name="price"type="hidden" value="{{$product->price}}">
                                                    <input name="quantity"type="hidden" value="1">
                                                    <br>
                                                    <button type="submit" class="btn btn-warning">Add To Card</button>
                                                </form>
                                                <a  href="{{route('singleProductPage',[$product->id,$product->slug])}}">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>

                        </div>


                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
@endsection
