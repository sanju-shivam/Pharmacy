@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12 m-auto">
            
            <div class="row p-2">
                <div class="col-md-8">
                    <h4>Edit the page</h4>
                </div>
                <div class="col-md-4 justify-content-between">
                    <a href="/admin/pages"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>

            <form role="form" method="POST"  action="{{action('Admin\AdminPagesController@update', $page->id)}}">

            @csrf

            <div class="form-group">
                <label for="title">Page Title</label>
            <input type="text" name="title" value="{{ $page->title }}" class="form-control" autocomplete="off" placeholder="Page Title Only" readonly>
            </div>

            <div class="form-group">
                <label for="keywords">Page SEO Keywords</label>
            <input type="text" name="keywords" value="{{ $page->keywords }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Page SEO Meta Description</label>
            <input type="text" name="description" value="{{ $page->description }}" class="form-control">
            </div>

            <div class="form-group" style="display: none">
                <label for="slug">URL Name</label>
            <input type="text" name="slug" value="{{ $page->slug }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">Page Body Content</label>
                <textarea type="text" id="editor" name="body" class="form-control">{{ $page->body }}</textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary">Submit</button>

            {{ method_field('PUT')}}

            </form>

        </div>
    </div>
</div>
     

@endsection
