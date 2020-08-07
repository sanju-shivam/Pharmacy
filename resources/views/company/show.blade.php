@extends('layouts.front')

@section('content')

<main class="main">
    <div class="m-4">
        <div class="col-md-12 px-2">
            <div class="row">
                <div class="col-md-3 border">
                    <div class="d-flex justify-content-center p-2">
                        <img src="/storage/logos/{{ $user->logo }}" width="100px">
                    </div>
                    <div class="my-4">
                        @include('leads.create')
                    </div>
                    <div class="">
                        <button class="show-hide btn w-100 btn-dark text-left" type="button">
                            <i class="fas fa-bars mr-3"></i>Product Categories<i
                                class="fa fa-long-arrow-down ml-3"></i>
                        </button>
                        <div class="category-list-item" id="">
                            <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>PCD Pharma Frenchise
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Third Party Manufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Cosmetic Derma Frenchise
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Ayurvedic PCD Frenchise
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Cardiac Diabetic
                                    Munufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Allopathic Drug
                                    Manufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>ENT Medicine
                                    Manufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Pediatric Range
                                    Manufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Manufacturing Fecilities
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Business Opportunities
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Ayurvedic Herbal
                                    Manufacturing
                                </li>
                                <li class="list-group-item nav-item">
                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Nutraceutical Range
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">

                    <!-- Banner -->

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                                
                            @foreach ($user->banners as $key => $banner)

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
                    
                    <div class="my-4" style="overflow-wrap: break-word">
                        <a href="#" type="button" class="row bg-dark rounded text-white p-2 mx-1 text-decoration-none" data-toggle="collapse" data-target="#about">About Us</a>
                        <div id="about" class="collapse">
                        <p>{!! $user->about !!}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col"><h4>Company Details:</h4></th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">Company Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Company Managing Director</th>
                                    <td>{{ $user->owner }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Registered Address</th>
                                    <td>{{ $user->address }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Total Number of Employees</th>
                                    <td>{{ $user->employees }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Year of Establishment</th>
                                    <td>{{ $user->year }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Legal Status of Firm</th>
                                    <td>{{ $user->type }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">GST No.</th>
                                    <td>{{ $user->gstn }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Nature of company</th>
                                    <td>{{ $user->nature }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Packaging/Payment and Shipment Details</th>
                                    <td>{{ $user->payment }}</td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="product-range-slider my-2">
                        <h3>Our Products</h3>
                        <hr>
                        <div class="">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

                                    @foreach ($user->products as $product)

                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="/storage/products/{{ $product->image }}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                            <p class="card-text">{{ $product->title}}</p>
                                            <p class="card-text">{!! \Illuminate\Support\Str::limit($product->text, $limit = 50) !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection