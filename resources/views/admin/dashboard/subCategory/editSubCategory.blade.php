@extends('admin.layouts.admin')
@section('title')
    SubCategory
@endsection
@section('content')
    <style>
        .form-select{

        }
    </style>
    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <div>
            <h3 class="text-primary">Edit subCategory</h3>
        </div>
        <form method="post"  action="{{route('updateSubCategory')}}" class="col-md-6 col-lg-6">

            @csrf
            <br/>
            <input name="id" type="hidden" value="{{$subCategory->id}}">
            <div class="form-outline ">
                <input type="text" id="form6Example1" name="subCategory_name" class="form-control" value="{{$subCategory->subCategory_name}}" />
                <label style="padding-bottom: 5px;" class="form-label" for="form6Example1">SubCategory Name</label>
            </div>
            <br/>
            <h5>Category Name</h5>
            <div class="form-outline ">

                <input type="text" id="form6Example1" name="category_name" class="form-control"value="{{$subCategory->category_name}}" readonly />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary ">Add subCategory</button>
        </form>
    </div>
@endsection
