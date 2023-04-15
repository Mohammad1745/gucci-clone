@extends('admin.layouts.admin')
@section('title')
   Add product
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
               <form>
                    <!-- 2 column grid layout with text inputs for the first and last names -->

                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example1" class="form-control"  />
                            <label class="form-label" for="form6Example1">Name</label>
                        </div>
                   <form action="{{ route('selectCategory') }}" method="GET">
                       <select name="category_id" class="form-select mb-4">
                           <option value="">select Category</option>
                           @foreach($categories as $category)
                               @if($category->subCategoryCount>0)
                                   <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                               @endif
                           @endforeach
                       </select>
                       <button type="submit">Go</button>
                   </form>
                        <select class="form-select mb-4">
                            <option selected>select Sub Category</option>

                        </select>

                    <!-- Message input -->
                    <div class="form-outline mb-4 ">
                        <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                        <label class="form-label" for="form6Example7">Description</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">Quantity</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="form6Example1" class="form-control"  />
                        <label class="form-label" for="form6Example1">price</label>
                    </div>
                    <div class="form-outline mb-4">
                      <label for="myfile">Select a image</label>
                      <input type="file" id="myfile" name="myfile">
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary ">Add Product</button>
                </form>
               </div>



    </div>
    </div>
@endsection
