@extends('customer.layouts.customer')
@section('content')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4"style="margin-top:50px;padding-bottom: 30px">
                <div class="box_main"  >
                    <div class="tshirt_img">
                        <img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"style="margin-top:50px;padding-bottom: 30px">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{$product->name}}</h4>
                        <p class="price_text text-left">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                    </div>
                    <div class="m-8 product-info">
                        <p class="lead">
                            {{$product->description}}
                        </p>
                        <ul class="p-2 bg-light m-2">
                            <li><p class="card-title">Category: {{$category->name}}</p></li>
                            <li><p>Subcategory: {{$subCategory->name}}</p></li>
                            <li><p>Available Quantity: {{$product->quantity}}</p></li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{route('addToCard')}}" method="post">
                            @csrf
                            <input name="product_id"type="hidden" value="{{$product->id}}">
                            <input name="product_name"type="hidden" value="{{$product->name}}">
                            <input name="price"type="hidden" value="{{$product->price}}">
                            <label for="product Quantity">Quantity</label>
                            <input name="quantity"type="number" min="1" max="{{$product->quantity}}" placeholder="1">
                            <br>
                            <button type="submit" class="btn btn-warning">Add To Card</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">


                <div class="container">



                    <h1 class="fashion_taital">Related Products</h1>

                    <div class="fashion_section_2">

                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">

                                        <h4 class="shirt_text">{{$product->name}}</h4>
                                        <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                        <div class="tshirt_img"><img src="{{ asset('storage/product_image/' . basename($product->image)) }}"/></div>

                                            <div class="buy_bt">
                                                <form action="{{route('addToCard')}}" method="post">
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
