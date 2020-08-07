@extends('layouts.front')

@section('content')

<main class="main">
    <div class="my-5">

        <div class="container">
            <div class="row">
                <div class="col-md-8 my-2">
                    <h2>{{ $blog->title }}</h2>
                    <hr>
                    <div>
                        <img style="max-width:100%" src="/storage/cover_images/{{ $blog->cover_image }}">
                    </div>
                    <hr>
                    <p>
                        {!! $blog->body !!}
                    </p>
                </div>
            </div>
            <hr>
        </div>

    </div>
</main>

@endsection