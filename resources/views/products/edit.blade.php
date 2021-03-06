@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto p-5 border rounded shadow">
            <div class="row">
                <div class="col-md-8">
                    <h4>Edit</h4>
                </div>
                <div class="col-md-4">
                    <a href="/admin/products"  class="btn btn-outline-info">Cancel and Go Back</a>
                    
                </div>
            </div>
            <hr>

            <div class="col-md-12 bg-light">
                <form role="form" method="POST"  enctype="multipart/form-data" action="{{action('ProductsController@update', $product->id)}}">
                
                @csrf
                
                <div class="form-group row">
                    <label for="file" class="col-md-2 col-form-label text-md-right">Image</label>
                    <input type="file" name="image" id="image" class="btn btn-outline-primary col-md-6">
                    
                </div>
                
                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>
                    <input type="text" name="title" id="title" value="{{ $product->title }}" class="form-control col-md-6">
                </div>
                
                <div class="form-group row" style="display: none">
                    <label for="slug" class="col-md-2 col-form-label text-md-right">slug</label>
                    <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control col-md-6">
                </div>

                <div class="form-group row">
                    <label for="molecules" class="col-md-2 col-form-label text-md-right">Molecules</label>
                    <input type="text" name="molecules" id="molecules" value="{{ $product->molecules }}" class="form-control col-md-6" autocomplete="off">
                </div>

                <div class="form-group d-flex justify-content-start">
                <label for="brand" class="col-md-2 col-form-label text-md-right">Brand</label>  
                    <select name="brand" class="form-control col-md-6 float-right">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group d-flex justify-content-start">
                    
                    <label for="category" class="col-md-2 col-form-label text-md-right">Category</label>  
                    <select name="category" class="form-control col-md-6 float-right">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-start">
                    <label for="state" class="col-md-2 col-form-label text-md-right">state</label>  
                    <select name="state" class="form-control col-md-6 float-right">
                        @foreach($states as $state)
                            <option  value="{{$state->id}}" @if($product->state_id == $state->id) selected @endif >{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-md-2">Discription:</label>
                    <div class="col-md-12">
                    <textarea name="text" id="editor" class="form-control col-md-6" autocomplete="off">{{ $product->text }}</textarea>
                    </div>
                </div>
                
                <div class="">
                    <button type="submit" class="btn btn-outline-success w-50">Submit</button>
                </div>
                
                {{ method_field('PUT')}}
                
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection