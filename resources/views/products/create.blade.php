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
                    <option value="andrapradesh">Andra Pradesh</option>
                    <option value="arunachalpradesh">Arunachal Pradesh</option>
                    <option value="assam">Assam</option>
                    <option value="bihar">Bihar</option>
                    <option value="chhattisgarh">Chhattisgarh</option>
                    <option value="chandigarh">Chandigarh</option>
                    <option value="delhi">Delhi</option>
                    <option value="goa">Goa</option>
                    <option value="gujarat">Gujarat</option>
                    <option value="haryana">Haryana</option>
                    <option value="himachalpradesh">Himachal Pradesh</option>
                    <option value="jammuandkashmir">Jammu and Kashmir</option>
                    <option value="jharkhand">Jharkhand</option>
                    <option value="karnataka">Karnataka</option>
                    <option value="kerala" >Kerala</option>
                    <option value="madhyapradesh" >Madhya Pradesh</option>
                    <option value="maharashtra" >Maharashtra</option>
                    <option value="manipur" >Manipur</option>
                    <option value="meghalaya" >Meghalaya</option>
                    <option value="mizoram" >Mizoram</option>
                    <option value="magaland" >Nagaland</option>
                    <option value="orissa" >Orissa</option>
                    <option value="punjab" >Punjab</option>
                    <option value="rajasthan" >Rajasthan</option>
                    <option value="sikkim" >Sikkim</option>
                    <option value="tamilnadu" >Tamil Nadu</option>
                    <option value="telagana" >Telagana</option>
                    <option value="tripura">Tripura</option>
                    <option value="uttaranchal" >Uttaranchal</option>
                    <option value="uttarpradesh" >Uttar Pradesh</option>
                    <option value="westbengal" >West Bengal</option>     
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