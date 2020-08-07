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
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-start">
                    <label for="Location" class="col-md-2 col-form-label text-md-right">Location</label>  
                    <select name="location" class="form-control col-md-6 float-right">
                        <option  value="AndraPradesh" @if($product->location == "AndraPradesh") selected @endif >Andra Pradesh</option>

                        <option value="ArunachalPradesh" @if($product->location == "ArunachalPradesh") selected @endif>Arunachal Pradesh</option>

                        <option value="Assam" @if($product->location == "Assam") selected @endif>Assam</option>

                        <option value="Bihar" @if($product->location == "Bihar") selected @endif>Bihar</option>

                        <option value="Chhattisgarh" @if($product->location == "Chhattisgarh") selected @endif>Chhattisgarh</option>

                        <option value="Chandigarh" @if($product->location == "Chandigarh") selected @endif>Chandigarh</option>

                        <option value="Delhi" @if($product->location == "Delhi") selected @endif>Delhi</option>

                        <option value="Goa" @if($product->location == "Goa") selected @endif>Goa</option>

                        <option value="Gujarat" @if($product->location == "Gujarat") selected @endif>Gujarat</option>

                        <option value="Haryana" @if($product->location == "Haryana") selected @endif>Haryana</option>

                        <option value="HimachalPradesh" @if($product->location == "HimachalPradesh") selected @endif>Himachal Pradesh</option>

                        <option value="JammuandKashmir" @if($product->location == "JammuandKashmir") selected @endif>Jammu and Kashmir</option>

                        <option value="Jharkhand" @if($product->location == "Jharkhand") selected @endif>Jharkhand</option>

                        <option value="Karnataka" @if($product->location == "Karnataka") selected @endif>Karnataka</option>

                        <option value="Kerala" @if($product->location == "Kerala") selected @endif>Kerala</option>

                        <option value="MadyaPradesh" @if($product->location == "MadyaPradesh") selected @endif>Madya Pradesh</option>

                        <option value="Maharashtra" @if($product->location == "Maharashtra") selected @endif>Maharashtra</option>

                        <option value="Manipur" @if($product->location == "Manipur") selected @endif>Manipur</option>

                        <option value="Meghalaya" @if($product->location == "Meghalaya") selected @endif>Meghalaya</option>

                        <option value="Mizoram" @if($product->location == "Mizoram") selected @endif>Mizoram</option>

                        <option value="Nagaland" @if($product->location == "Nagaland") selected @endif>Nagaland</option>

                        <option value="Orissa" @if($product->location == "Orissa") selected @endif>Orissa</option>

                        <option value="Punjab" @if($product->location == "Punjab") selected @endif>Punjab</option>

                        <option value="Rajasthan" @if($product->location == "Rajasthan") selected @endif>Rajasthan</option>

                        <option value="Sikkim" @if($product->location == "Sikkim") selected @endif>Sikkim</option>

                        <option value="TamilNadu" @if($product->location == "TamilNadu") selected @endif>Tamil Nadu</option>

                        <option value="Telagana" @if($product->location == "Telagana") selected @endif>Telagana</option>

                        <option value="Tripura" @if($product->location == "Tripura") selected @endif>Tripura</option>

                        <option value="Uttaranchal" @if($product->location == "Uttaranchal") selected @endif>Uttaranchal</option>

                        <option value="UttarPradesh" @if($product->location == "UttarPradesh") selected @endif>Uttar Pradesh</option>

                        <option value="WestBengal" @if($product->location == "WestBengal") selected @endif>West Bengal</option>     
                    </select>
                </div>
                
                <div class="form-group row">
                    <label for="text" class="col-md-2">Discription:</label>
                    <div class="col-md-8">
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