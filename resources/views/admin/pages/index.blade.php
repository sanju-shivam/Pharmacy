@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <h4>Check all the page on platform</h4>

            <!-- List of page -->
        
            <div class="row">
                <div class="col-md-12 pt-5">
                    @foreach ($pages as $page)
                    <div class="card m-2 shadow">
                        <div class="card-header">
                            <h5>Page Name: {{ $page->title }}</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">SEO Description: {{ $page->description }}</h5>
                        <p class="card-text">SEO Keywords: {{ $page->keywords }}</p>
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-primary">Edit Page</a>
                            <a href="/{{ $page->slug }}" class="btn btn-outline-primary">
                                See Page: {{ $page->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
