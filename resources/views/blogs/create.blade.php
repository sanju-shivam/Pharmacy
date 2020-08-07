@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="row">
                <div class="col-md-8">
                    <h4>Add New Blogs</h4>
                </div>
                <div class="col-md-4">
                    <a href="/admin/blogs"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>
            <form role="form" method="POST"  enctype="multipart/form-data" action="{{action('Admin\BlogsController@store')}}">

            @csrf

            <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" id="title" name="title" value="" class="form-control" autocomplete="off" placeholder="Blog Title Only">
            </div>

            <div class="form-group" style="display: none">
                <label for="title">Blog URL <small>(e.g https://pharma/blogs/blog-title-for-seo)</small></label>
                <input type="text" id="slug" name="slug" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Paragraph</label>
                <textarea id="editor" type="text" name="body" value="" class="form-control" autocomplete="off" placeholder="Body Text"></textarea>
            </div>

            <div class="form-group">
                <label for="file">Cover image for blog max size 2mb</label>
                <input type="file" name="cover_image" class="btn btn-outline-primary w-100">
            </div>

            <button type="submit" class="btn btn-outline-primary">Submit</button>

            </form>
            <div class="my-3">
            </div>
            
        </div>

    </div>
</div>
     

@endsection
