@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto p-5 border rounded shadow">
            <div class="row">
                <div class="col-md-8">
                    <h4>Add New Home Page Banner <br><small>(best to keep three bnners only)</small></h4>
                </div>
                <div class="col-md-4">
                    <a href="/admin/banners"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>

            <form role="form" method="POST"  enctype="multipart/form-data" action="{{action('BannersController@store')}}">

            @csrf

            <div class="form-group row">
                <label for="file" class="col-md-2 col-form-label text-md-right">Image</label>
                <input type="file" name="image" id="image" class="btn btn-outline-primary col-md-6">
                
            </div>

            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>
                <input type="text" name="title" id="title" class="form-control col-md-6" autocomplete="off" placeholder="Main title">
            </div>

            <div class="form-group row">
                <label for="text" class="col-md-2 col-form-label text-md-right">Text</label>
                <input type="text" name="text" id="text" class="form-control col-md-6" autocomplete="off" placeholder="Additional text">
            </div>

            <button type="submit" class="btn btn-outline-success w-100">Submit</button>

            </form>
            
        </div>
    </div>
</div>

@endsection