@extends('admin.layouts.admin')
@section('title')
   Add product
@endsection
@section('content')


<!-- name,category,subcategory,description,price,Quantity ,image -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-primary" href="#"> <b>ALL PRODUCTS </b> </a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0"/>
      <span class="navbar-text">
        <a href="{{route("addProduct")}}" class="btn btn-info">Add Products</a>
      </span>
    </div>
  </div>
</nav>

    <div style="margin-left: 1vw; margin-top:1vw;justify-content: center">
        <link rel="stylesheet" href="/css/mdb.min.css" />

    <section style="background-color: #ffff;">
      <div class="container py-5">
        @foreach($products as $product)
              <div class="row justify-content-center mb-3">

                  <div class="col-md-12 col-xl-10">

                      <div class="card shadow-0 border rounded-3">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                          <img src="{{ asset('storage/product_image/' . basename($product->image)) }}" class="w-100"/>

                                          <a href="#!">
                                              <div class="hover-overlay">
                                                  <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                              </div>
                                          </a>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-lg-6 col-xl-6">
                                      <h5>{{$product->name}}</h5>
                                      <div class="d-flex flex-row">

                                          <span>{{$product->quantity}}</span>
                                      </div>
                                      <div class="mt-1 mb-0 text-muted small">
                                          <span>100% cotton</span>
                                          <span class="text-primary"> • </span>
                                          <span>Light weight</span>
                                          <span class="text-primary"> • </span>
                                          <span>Best finish<br /></span>
                                      </div>
                                      <div class="mb-2 text-muted small">
                                          <span>Unique design</span>
                                          <span class="text-primary"> • </span>
                                          <span>For men</span>
                                          <span class="text-primary"> • </span>
                                          <span>Casual<br /></span>
                                      </div>
                                      <p class="text-truncate mb-4 mb-md-0">
                                        {{$product->description}}
                                      </p>
                                  </div>
                                  <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                      <div class="d-flex flex-row align-items-center mb-1">
                                          <h4 class="mb-1 me-1">${{$product->price}}</h4>
                                      </div>
                                      <div class="d-flex flex-column mt-4">
                                          <button class="btn btn-primary btn-sm" type="button">Details</button>
                                          <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                              Add to wishlist
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
        @endforeach

      </div>
    </section>

    </div>
@endsection
