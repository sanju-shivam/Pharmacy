@extends('layouts.front')

@section('content')

    <main class="main">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h1>{{ $page->title }}</h1>
                    <hr>
                    <p>
                        {!! $page->body !!}
                    </p>
                </div>
            </div>
        </div>
    </main>

@endsection
