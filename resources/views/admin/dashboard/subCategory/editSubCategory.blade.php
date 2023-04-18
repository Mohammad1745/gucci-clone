@extends('admin.layouts.admin')
@section('title')
    Subcategory
@endsection
@section('content')
    <style>
        .form-select{

        }
    </style>
    <div style="margin-left: 10vw; margin-top:5vw;justify-content: center">
        <div>
            <h3 class="text-primary">Edit subcategory</h3>
        </div>
        <form method="post"  action="{{route('updateSubcategory')}}" class="col-md-6 col-lg-6">

            @csrf
            <br/>
            <input name="id" type="hidden" value="{{$subcategory->id}}">
            <div class="form-outline ">
                <input type="text" id="form6Example1" name="name" class="form-control" value="{{$subcategory->name}}" />
                <label style="padding-bottom: 5px;" class="form-label" for="form6Example1">Subcategory Name</label>
            </div>
            <br/>
            <h5>Category Name</h5>
            <div class="form-outline ">

                <input type="text" id="form6Example1" name="category_name" class="form-control"value="{{$subcategory->category_name}}" readonly />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary ">Add subcategory</button>
        </form>
    </div>
@endsection
