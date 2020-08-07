@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto p-5 border rounded shadow">
            <div class="row">
                <div class="col-md-8">
                    <h4>Editing Home Page Banner </h4>
                </div>
                <div class="col-md-4">
                    <a href="/admin/banners"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>

            </div>

            <hr>

            <form role="form" method="POST"  enctype="multipart/form-data" action="{{ action('BannersController@update', $banner->id) }}">

            @csrf

            <div class="form-group row d-flex justify-content-around">
                <label for="file" class="col-md-2 col-form-label text-md-right">Banner</label>
                <input type="file" name="image" id="image" value="{{$banner->image}}" class="btn btn-outline-primary col-md-4">
                <img src="/storage/banners/{{ $banner->image }}" width="100px" class="float-right col-md-2 border rounded p-1">
                <small>You are changing this image</small>
            </div>

            <div class="form-group row d-flex justify-content-start">
                <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>
                <input type="text" name="title" id="title" value="{{ $banner->title}}" class="form-control col-md-6" autocomplete="off" placeholder="Any title you would like to show on banner">
            </div>

            <div class="form-group row d-flex justify-content-start">
                <label for="text" class="col-md-2 col-form-label text-md-right">Text</label>
                <input type="text" name="text" id="text" value="{{ $banner->text}}" class="form-control col-md-6" autocomplete="off" placeholder="">
            </div>

            <hr>

            <button type="submit" class="btn btn-outline-success w-100">Submit</button>
            
            {{ method_field('PUT')}}

            </form>
            
        </div>
    </div>
</div>

@endsection