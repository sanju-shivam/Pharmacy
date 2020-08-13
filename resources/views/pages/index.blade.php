@extends('layouts.front')

@section('content')
    
    
    <main class="main">
        <div class="col-md-12 py-1">
            <div class="row">
                <div class="col-md-3 pt-1 mb-3">
                    <div class="category-list border">
                        <button class="show-hide btn w-100 btn-dark text-left" type="button">
                            <i class="fas fa-bars mr-3"></i>Categories List<i class="fa fa-long-arrow-down ml-3"></i>
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


                    <!-- ------------------------------------------------ -->


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

                <!-- Main Banners -->

                <div class="col-md-9 p-1 mb-3">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                                
                            @foreach ($banners as $key => $banner)

                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <img class="d-block img-fluid w-100" src="/storage/banners/{{ $banner->image }}" />
                                <div class="carousel-caption"> 
                                    <h5 class="m-0">{{ $banner->title}}</h5>
                                    <p>{{ $banner->text}}</p>
                                </div>
                            </div>
                            
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- PCD Pharma Frenchise -->

        <div class="col-md-12 my-3 bg-light">
            <div class="row">
                <div class="col-md-3 m-auto">
                    <h4 class="btn font-weight-bolder btn-dark w-100">PCD Pharma Frenchise</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Ayurvedic Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Allopathic Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Homeopathic Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Veterinary Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Derma Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Gynae Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Neuropsychiatry Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Ortho Surgery Franchise
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Pediatric Range Franchise
                        </li>
                    </ul>
                    <div  class="justify-content-center">
                        <a class="btn btn-success w-100" href="#">View All</a>
                    </div >
                </div>
                <div class="col-md-9 py-3">
                    <div class="row">
                        <div class="col-md-3 p-2 my-2">
                            <img class="img-fluid d-block" src="asset/img/6.jpg" />
                            <p class="text-center long-cat-text">
                                Pharma Third Party Manufacturing
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 four-image-group  py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group  py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group  py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group  py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-2 my-2">
                            <img class="img-fluid d-block" src="asset/img/5.jpg" />
                            <p class="text-center long-cat-text">
                                Pharma Third Party Manufacturing
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Image 2 -->

        <div class="col-md-12 py-5">
            <div class="">
                <div class="carousel slide" data-ride="carousel" id="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid h-25 w-100" src="asset/img/7.png" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="asset/img/7.png" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="asset/img/7.png" />
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Third Party Manufacturing -->
        <div class="col-md-12 my-3 bg-light">
            <div class="row">
                <div class="col-md-3 m-auto">
                    <h4 class="btn font-weight-bolder btn-dark w-100">Third Party Manufacturing</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Pharma Third Party Manufacturing
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Ayurvedic Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Allopathic Product Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Derma Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Veterinary Product Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Diabetic Product Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Syrup Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Pharma Tablet Manufacturer
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-angle-double-right text-primary mr-2"></i>Pharma Capsule Manufacturer
                        </li>
                    </ul>
                    <div  class="justify-content-center">
                        <a class="btn btn-success w-100" href="#">View All</a>
                    </div >
                </div>
                <div class="col-md-9 py-3">
                    <div class="row">
                        <div class="col-md-3 p-2 my-2">
                            <img class="img-fluid d-block" src="asset/img/6.jpg" />
                            <p class="text-center long-cat-text">
                                Pharma Third Party Manufacturing
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 four-image-group py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                                <div class="col-md-6 four-image-group py-2">
                                    <img class="img-fluid d-block cat-img-block p-2" src="asset/img/1.png" />
                                    <p class="text-center cat-text">
                                        Pharma Third Party Manufacturing
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-2 my-2">
                            <img class="img-fluid d-block" src="asset/img/5.jpg" />
                            <p class="text-center long-cat-text">
                                Pharma Third Party Manufacturing
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Image 3 -->

        <div class="col-md-12 py-5">
            <div class="">
                <div class="carousel slide" data-ride="carousel" id="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="asset/img/7.png" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="asset/img/7.png" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="asset/img/7.png" />
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Brands -->

        <div class="pt-5 pb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center mx-auto col-md-12">
                        <h1 class="mb-4">Featured Barands</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-light.svg" />
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg" />
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-light.svg" />
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-dark.svg" />
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg" />
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 p-0">
                        <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-light.svg" />
                    </div>
                </div>
            </div>
        </div>

        <!-- State Filter -->

        <div class="col-md-12 py-5 text-center bg-light">
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-md-8">
                        <h1>Select State</h1>
                        <div class="row text-muted">
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-angellist fa-3x"></i>
                            </div>
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-cc-visa fa-3x"></i>
                            </div>
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-empire fa-3x"></i>
                            </div>
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-paypal fa-3x"></i>
                            </div>
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-rebel fa-3x"></i>
                            </div>
                            <div class="col-md-2 col-4 p-2">
                                <i class="d-block fa fa-first-order fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form and Review -->

        <div class="py-5" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 shadow rounded p-5">
                        <div class="mx-auto col-lg-12 col-10">
                            <h4>Post your requirment</h4>
                            @include('leads.create')
                        </div>
                    </div>

                    <!--- Rewiew Carousel --->

                    <div class="col-md-6">
                        <div class="pt-5 m-auto">
                            <div class="justify-content-center">
                                <h4 class="text-center">Customer Review</h4>
                            </div>
                        </div>
                        <div id="carouselSlidesOnly" class="carousel slide text-center p-5" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="lead">
                                        "I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks."
                                    </p>
                                    <p>
                                        <b>Johann Goethe</b><br /><small>CEO and founder</small>
                                    </p>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        "I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks."
                                    </p>
                                    <p>
                                        <b>Johann Goethe</b><br /><small>CEO and founder</small>
                                    </p>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        "I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks."
                                    </p>
                                    <p>
                                        <b>Johann Goethe</b><br /><small>CEO and founder</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 py-5">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-3">{{ $page->title }}</h1>
                        <p> {{ $page->body }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How it works -->
        <hr />
        <div class="col-md-12 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h2 class="d-flex flex-column justify-content-center align-items-center">
                            How it works?
                        </h2>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center mb-5">
            <div class="container">
                <div class="row justify-content-center pt-4">
                    <div class="col-lg-3 col-6 px-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="d-block fa fa-edit fa-4x mb-2 text-success"></i>
                              <p class="card-text lead">Post your requriment.</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3 col-6 px-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="d-block fa fa-user-shield fa-4x mb-2 text-success"></i>
                              <p class="card-text lead">Your enquiry is verified.</p>
                            </div>
                          </div>
                        
                    </div>
                    <div class="col-lg-3 col-6 px-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="d-block fa fa-send fa-4x mb-2 text-success"></i>
                              <p class="card-text lead">Your requirements sent to suppliers.</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3 col-6 px-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="d-block fa fa-thumbs-up fa-4x mb-2 text-success"></i>
                              <p class="card-text lead">Suppliers will contact you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Section -->
        <hr>
        <div class="col-md-12 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h2 class="d-flex flex-column justify-content-center align-items-center">
                            Latest Updates
                        </h2>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-4">

                    <div class="row">

                        @foreach($blogs as $blog)

                            <div class="col-md-4 py-2">
                                <div class="card">
                                <img src="/storage/cover_images/{{ $blog->cover_image}}" class="card-img-top blog-feed-img" alt="...">
                                    <div class="card-body">
                                        <a href="/blogs/{{ $blog->slug }}">
                                                <h3>{{ $blog->title }}</h3>
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
    </main>

    
@endsection