@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto p-5 border rounded shadow">
            <div class="row">
                <div class="col-md-8">
                    <h4>Crate a product</h4>
                </div>
                <div class="col-md-4">
                    <a href="/admin/products"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>

            <form role="form" method="POST"  enctype="multipart/form-data" action="{{action('ProductsController@store')}}">

            @csrf

            <div class="form-group row">
                <label for="file" class="col-md-2 col-form-label text-md-right">Image</label>
                <input type="file" name="image" id="image" class="btn btn-outline-primary col-md-6">
                
            </div>

            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>
                <input type="text" name="title" id="title" class="form-control col-md-6" autocomplete="off">
            </div>

            <div class="form-group row" style="display: none">
                <label for="slug" class="col-md-2 col-form-label text-md-right">slug</label>
                <input type="text" name="slug" id="slug" class="form-control col-md-6" autocomplete="off">
            </div>

            <div class="form-group row">
                <label for="molecules" class="col-md-2 col-form-label text-md-right">Molecules</label>
                <input type="text" name="molecules" id="molecules" class="form-control col-md-6" autocomplete="off">
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
                    <option value="">--Select--</option>
                    <option value="AndraPradesh">Andra Pradesh</option>
                    <option value="ArunachalPradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="HimachalPradesh">Himachal Pradesh</option>
                    <option value="JammuandKashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala" >Kerala</option>
                    <option value="MadhyaPradesh" >Madhya Pradesh</option>
                    <option value="Maharashtra" >Maharashtra</option>
                    <option value="Manipur" >Manipur</option>
                    <option value="Meghalaya" >Meghalaya</option>
                    <option value="Mizoram" >Mizoram</option>
                    <option value="Nagaland" >Nagaland</option>
                    <option value="Orissa" >Orissa</option>
                    <option value="Punjab" >Punjab</option>
                    <option value="Rajasthan" >Rajasthan</option>
                    <option value="Sikkim" >Sikkim</option>
                    <option value="TamilNadu" >Tamil Nadu</option>
                    <option value="Telagana" >Telagana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttaranchal" >Uttaranchal</option>
                    <option value="UttarPradesh" >Uttar Pradesh</option>
                    <option value="WestBengal" >West Bengal</option>     
                </select>
            </div>

            <div class="form-group row">
                <label for="text" class="col-md-2">Discription:</label>
                <textarea name="text" id="editor" class="form-control col-md-6" autocomplete="off"></textarea>
            </div>

            <div class="">
                <button type="submit" class="btn btn-outline-success w-50">Submit</button>
            </div>

            </form>
            
        </div>
    </div>
</div>

@endsection