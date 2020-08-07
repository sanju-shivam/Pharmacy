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

                                <!-- -------------------------------------- -->
                                <div class="">
                                    <button class="show-hide btn w-100 btn-dark text-left" type="button">
                                        <i class="fas fa-bars mr-3"></i>State List<i
                                            class="fa fa-long-arrow-down ml-3"></i>
                                    </button>
                                    <div class="category-list-item" id="">
                                        <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">

                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/AndraPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Andra Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/ArunachalPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Arunachal Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Assam')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Assam
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Bihar')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Bihar
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Chhattisgarh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Chhattisgarh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Delhi')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Delhi
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Goa')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Goa
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Gujarat')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Gujarat
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Haryana')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Haryana
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/HimachalPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Himachal Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/JammuandKashmir')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Jammu and Kashmir
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Jharkhand')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Jharkhand
                                                </a>
                                            </li>
                                             <a class="btn w-100 btn-success" href="/States">View All</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->

                            <div class="col-md-6 mt-2">
                                <div class=""> 
                                    <h5 class="card-title"> {{ $product->title }} </h5>
                                </div>

                                <div class="mb-3">
                                    <img src="/storage/products/{{ $product->image }}" class="card-img-top w-50">
                                    <div class="card-body">
                                    <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                                    <p><strong>Molecules:</strong> {{ $product->molecules }}</p>
                                    <p class="card-text"><strong>Description:</strong> {!! $product->text !!}</p>
                                    </div>
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
