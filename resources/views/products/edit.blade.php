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
                        <option  value="andrapradesh" @if($product->location == "andrapradesh") selected @endif >Andra Pradesh</option>

                        <option value="arunachalpradesh" @if($product->location == "arunachalpradesh") selected @endif>Arunachal Pradesh</option>

                        <option value="assam" @if($product->location == "assam") selected @endif>Assam</option>

                        <option value="bihar" @if($product->location == "bihar") selected @endif>Bihar</option>

                        <option value="chhattisgarh" @if($product->location == "chhattisgarh") selected @endif>Chhattisgarh</option>

                        <option value="chandigarh" @if($product->location == "chandigarh") selected @endif>Chandigarh</option>

                        <option value="delhi" @if($product->location == "delhi") selected @endif>Delhi</option>

                        <option value="goa" @if($product->location == "goa") selected @endif>Goa</option>

                        <option value="gujarat" @if($product->location == "gujarat") selected @endif>Gujarat</option>

                        <option value="haryana" @if($product->location == "haryana") selected @endif>Haryana</option>

                        <option value="himachalpradesh" @if($product->location == "himachalpradesh") selected @endif>Himachal Pradesh</option>

                        <option value="jammuandkashmir" @if($product->location == "jammuandkashmir") selected @endif>Jammu and Kashmir</option>

                        <option value="jharkhand" @if($product->location == "jharkhand") selected @endif>Jharkhand</option>

                        <option value="karnataka" @if($product->location == "karnataka") selected @endif>Karnataka</option>

                        <option value="kerala" @if($product->location == "kerala") selected @endif>Kerala</option>

                        <option value="madyapradesh" @if($product->location == "madyapradesh") selected @endif>Madya Pradesh</option>

                        <option value="maharashtra" @if($product->location == "maharashtra") selected @endif>Maharashtra</option>

                        <option value="manipur" @if($product->location == "manipur") selected @endif>Manipur</option>

                        <option value="meghalaya" @if($product->location == "meghalaya") selected @endif>Meghalaya</option>

                        <option value="mizoram" @if($product->location == "mizoram") selected @endif>Mizoram</option>

                        <option value="nagaland" @if($product->location == "nagaland") selected @endif>Nagaland</option>

                        <option value="orissa" @if($product->location == "orissa") selected @endif>Orissa</option>

                        <option value="punjab" @if($product->location == "punjab") selected @endif>Punjab</option>

                        <option value="rajasthan" @if($product->location == "rajasthan") selected @endif>Rajasthan</option>

                        <option value="sikkim" @if($product->location == "sikkim") selected @endif>Sikkim</option>

                        <option value="tamilnadu" @if($product->location == "tamilnadu") selected @endif>Tamil Nadu</option>

                        <option value="telagana" @if($product->location == "telagana") selected @endif>Telagana</option>

                        <option value="tripura" @if($product->location == "tripura") selected @endif>Tripura</option>

                        <option value="uttaranchal" @if($product->location == "uttaranchal") selected @endif>Uttaranchal</option>

                        <option value="uttarpradesh" @if($product->location == "uttarpradesh") selected @endif>Uttar Pradesh</option>

                        <option value="westbengal" @if($product->location == "westbengal") selected @endif>West Bengal</option>     
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