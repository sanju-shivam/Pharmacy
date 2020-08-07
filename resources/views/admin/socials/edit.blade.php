@extends('layouts.dash')

@section('content')
@include('inc.messages')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto">
            
            <div class="row p-2">
                <div class="col-md-8">
                    <h4>Edit the social link</h4>
                </div>
                <div class="col-md-4 justify-content-between">
                    <a href="/admin/socials"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>

            <form role="form" method="POST"  action="{{ action('Admin\SocialLinksController@update', $social->id) }}">

            @csrf

            <div class="form-group">
            <label for="name">Social Name</label>
            <input type="text" name="name" value="{{ $social->name }}" class="form-control" autocomplete="off" placeholder="" readonly>
            </div>

            <div class="form-group">
            <label for="name">Social Icon</label>
            <input type="text" name="icon" value="{{ $social->icon }}" class="form-control" autocomplete="off" placeholder="">
            </div>

            <div class="form-group">
                <label for="body">Social Link/Code</label>
                <textarea type="text" id="" rows="3" name="link" class="form-control">{{ $social->link }}</textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary">Update Link</button>

            {{ method_field('PUT')}}

            </form>

        </div>
    </div>
</div>
     

@endsection
