@extends('layouts.front')

@section('content')

<main class="main">

    <div class="container">
        <div class="col-md-12 py-5">
                <h4>All categories</h4>

            <div class="row">

                @foreach($categories as $category)

                    <div class="border-left m-3 pl-3">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none text-dark">
                        <i class="fas fa-angle-double-right text-primary mr-2"></i>{{ $category->name }}
                        </a>
                    </div>

                @endforeach
                
            </div>
        </div>
    </div>
</main>

@endsection
