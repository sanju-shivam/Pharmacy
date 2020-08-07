@extends('layouts.front')

@section('content')

<main class="main">
    <div class="px-3">
        <div class="col-md-12 py-5">

            @if(count($blogs) > 0)
                
                <div class="">
                    <h1 class="p-2 bg-light rounded">All Blog Posts</h1>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="row">

                                @foreach($blogs as $blog)

                                <div class="col-md-4 py-2">
                                    <div class="card">
                                    <img src="/storage/cover_images/{{ $blog->cover_image}}" class="card-img-top blog-feed-img" alt="...">
                                        <div class="card-body">
                                            <a href="/blogs/{{ $blog->slug }}">
                                                <h3> {{ $blog->title }}</h3>
                                            </a>
                                        <p class="card-text">{!! \Illuminate\Support\Str::limit($blog->body, $limit = 100) !!}</p>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            @else

            <h4>No Blogs avaiavle to show</h4>

            @endif

        </div>
    </div>
</main>

@endsection