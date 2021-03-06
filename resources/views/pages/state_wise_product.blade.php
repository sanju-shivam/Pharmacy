@extends('layouts.front')

@section('content')

<main id="main">
    <div class="">
        <div class="col-md-12">

            <!-- List of products -->
            
            <div class="row">
                <div class="col-md-12 pt-5">
                        <div class="row">
                            <div class="col-md-3">
                                
                                <div class="">
                                    <button class="show-hide btn w-100 btn-dark text-left" type="button">
                                        <i class="fas fa-bars mr-3"></i>Our Product Categories<i
                                            class="fa fa-long-arrow-down ml-3"></i>
                                    </button>
                                    <div class="category-list-item" id="">
                                        <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">

                                @foreach ($categories as $category)

                                <li class="list-group-item nav-item">
                                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-angle-double-right text-primary mr-2"></i>{{ $category->name }}
                                    </a>
                                </li>
                                    
                                @endforeach
                                
                                <a class="btn w-100 btn-success" href="/categories">View All</a>
                            </ul>
                                    </div>
                                </div>
                                <br>



                                <!-- ---------------------------- -->



                                <div class="category-list border">
                                    <button class="show-hide btn w-100 btn-dark text-left" type="button">
                                        <i class="fas fa-bars mr-3"></i>State List<i class="fa fa-long-arrow-down ml-3"></i>
                                    </button>
                                    <div class="category-list-item" id="">
                                        <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">

                                            @foreach ($states as $state)

                                            <li class="list-group-item nav-item">
                                                <a href="{{ route('products.index', ['state' => $state->slug]) }}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>{{ $state->name }}
                                                </a>
                                            </li>
                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->

                            <div class="col-md-6 mt-2">
                                <h4>{{ $name }}</h4>
                                @forelse ($products as $product)

                                    <div class="card mb-3 shadow" style="">
                                        <div class="row no-gutters">

                                            <div class="col-md-4 d-flex justify-content-around p-2 border">
                                                <img src="public\products\{{ $product->image }}" class="card-img">
                                            </div>
                                            
                                            <div class="col-md-8 p-2">

                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->title}}</h5>
                                                    <p class="card-text"> {!! \Illuminate\Support\Str::limit($product->text, $limit = 100) !!} </p>
                                                    <div class=""><a href="{{ url($product->location.'/'.$product->slug) }}"><button class="btn btn-outline-warning float-left">View Product</button></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                @empty

                                    <div class="card">
                                        <div class="card-title p-5 shadow bg-light">
                                            <h5>No products found</h5>
                                        </div>
                                    </div>
                                    
                                @endforelse

                                    <div class=" d-flex justify-content-around">
                                        {{ $products->appends(request()->except('page'))->links() }}
                                    </div>
                            </div>

                            <div class="col-md-3 border rounded ">
                                <div class="my-4">
                                    <h3>Post your requirement</h3>
                                    @include('leads.create')
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</main>
     

@endsection
