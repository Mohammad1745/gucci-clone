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
                    @php
                    $categories=$ArrayNew;
                    @endphp

                <form method="post" action="{{route('storeProduct')}}" enctype="multipart/form-data">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    @csrf

                    <div class="form-outline mb-4">
                        <input name="name" type="text"  value="{{$product->name}}" @endif id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">Name</label>
                    </div>
                    @if (isset($errors) && $errors->has('name'))
                        <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                    <select name="category_id" class="form-select mb-4" onchange="this.form.submit()">
                        <option >select Category</option>
                        @foreach($categories as $category)
                            @if($category->subcategory_count>0)
                                <option value="{{ $category->id }}" @if(isset($oldData)) @if($oldData['category_id']==$category->id) selected @endif @endif>{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if (isset($errors) && $errors->has('category_id'))
                        <span class="text-danger"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                    <select name="subcategory_id" class="form-select mb-4">
                        <option value="">select Sub Category</option>
                        @if(isset($subcategories))
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if (isset($errors) && $errors->has('subcategory_id'))
                        <span class="text-danger"><strong>{{ $errors->first('subcategory_id') }}</strong></span>
                    @endif
                    <!-- Message input -->
                    <div class="form-outline mb-4 ">
                        <textarea name="description" class="form-control" id="form6Example7" rows="4"></textarea>
                        <label class="form-label" for="form6Example7">Description</label>
                        @if (isset($errors) && $errors->has('description'))
                            <span class="text-danger"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-outline mb-4">
                        <input name="quantity" type="text" id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">Quantity</label>
                        @if (isset($errors) && $errors->has('quantity'))
                            <span class="text-danger"><strong>{{ $errors->first('quantity') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-outline mb-4">
                        <input name="price" type="text" id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">price</label>
                        @if (isset($errors) && $errors->has('price'))
                            <span class="text-danger"><strong>{{ $errors->first('price') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-outline mb-4">
                        <label for="image">Select a image</label>
                        <input type="file" name="image" id="image" accept="image/*">
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
