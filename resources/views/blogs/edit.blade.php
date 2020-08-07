@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto">
            
            <div class="row">
                <div class="col-md-8">
                    <h4>Edit the blog</h4>
                </div>
                <div class="col-md-4 justify-content-between">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    
                </div>
            </div>
            <hr>

            <form role="form" method="POST" action="{{action('Admin\BlogsController@update', $blog->id)}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title">Blog Title</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}" class="form-control" autocomplete="off" placeholder="Blog Title Only">
            </div>

            <div class="form-group">
                <label for="title">Blog URL <small>(e.g https://pharma/blogs/blog-title-for-seo)</small></label>
            <input type="text" id="slug" name="slug" value="{{ $blog->slug }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Paragraph</label>
                <textarea type="text" id="editor" name="body" class="form-control">{{ $blog->body }}</textarea>
            </div>

            <div class="form-group">
                <label for="file">Cover image for blog max size 2mb</label>
                <input type="file" name="cover_image" class="btn btn-outline-primary w-100">
            </div>

            <button type="submit" class="btn btn-outline-primary">Submit</button>

            {{ method_field('PUT')}}

            </form>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content w-75 m-auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Are you sure you want to delete this blog!</h2>
                    <div class="row d-flex justify-content-around">
                        <form  action="{{ action('Admin\BlogsController@destroy', $blog->id) }}" method="POST" class="">
                            @csrf   
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
