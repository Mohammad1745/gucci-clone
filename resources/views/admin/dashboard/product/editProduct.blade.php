@extends('admin.layouts.admin')
@section('title')
    Edit product
@endsection
@section('content')


    <!-- name,category,subcategory,description,price,Quantity ,image -->


    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <link rel="stylesheet" href="/css/mdb.min.css" />
        <div>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="mb-5">
                <h2 class="text-info"> <i> Add Product</i></h2>
            </div>

            <div class="col-md-8 col-lg-8">

                <form method="post" action="{{route('updateProduct')}}" enctype="multipart/form-data">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-outline mb-4">
                        <input name="name" type="text"  value="{{$product->name}}"  id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">Name</label>
                    </div>
                    @if (isset($errors) && $errors->has('name'))
                        <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif

                    <!-- Message input -->
                    <div class="form-outline mb-4 ">
                        <textarea name="description" class="form-control" id="form6Example7" rows="4">{{$product->description}}</textarea>
                        <label class="form-label" for="form6Example7">Description</label>
                        @if (isset($errors) && $errors->has('description'))
                            <span class="text-danger"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-outline mb-4">
                        <input name="quantity" type="text" id="form6Example1" class="form-control" value="{{$product->quantity}}" />
                        <label class="form-label" for="form6Example1">Quantity</label>
                        @if (isset($errors) && $errors->has('quantity'))
                            <span class="text-danger"><strong>{{ $errors->first('quantity') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-outline mb-4">
                        <input name="price" type="text" id="form6Example1" class="form-control"  value="{{$product->price}}"/>
                        <label class="form-label" for="form6Example1">price</label>
                        @if (isset($errors) && $errors->has('price'))
                            <span class="text-danger"><strong>{{ $errors->first('price') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-outline mb-4">
                        <label for="image">Select a image</label>
                        <input type="file" name="image" id="image" accept="image/*" value="{{$product->image}}">
                        @if (isset($errors) && $errors->has('image'))
                            <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary ">Update Product</button>
                </form>
            </div>



        </div>
    </div>
@endsection
