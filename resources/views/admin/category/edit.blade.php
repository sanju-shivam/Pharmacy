@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto p-5">
            
            <div class="row">
                <div class="col-md-8">
                    <h4>Edit Category</h4>
                </div>
                <div class="col-md-4 justify-content-between">
                    <a href="/admin/category"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>

            <form  action="{{ action('Admin\CategoryController@update', $category->id)}}" method="POST" class="float-left">
                            
                @csrf

                <div class="input-group mb-3">
                <input id="name" type="text" name="name" value="{{ $category->name}}" class="form-control" autocomplete="off" placeholder="category name">

                <div class="form-group" style="display: none">
                <input id="slug" type="text" name="slug" value="" class="form-control">
                </div>

                {{ method_field('PUT')}}

                <button type="submit" class="btn btn-success rounded-0">Save</button>

            </form>

        </div>
    </div>
</div>
     

@endsection
