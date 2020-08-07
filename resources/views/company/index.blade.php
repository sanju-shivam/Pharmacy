@extends('layouts.front')

@section('content')

<main id="main">
    <div class="">
        <div class="col-md-12">

            <!-- List of Users -->
            
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

                            <!-- Card Body -->

                            <div class="col-md-6 mt-2">
                                <h4>All Companies</h4>

                                @foreach ($users as $user)

                                    <div class="card mb-3 shadow" style="">
                                        <div class="row no-gutters">

                                            <div class="col-md-4 d-flex justify-content-around p-2 border">
                                                <img src="/storage/logos/{{ $user->logo }}" class="card-img">
                                            </div>
                                            
                                            <div class="col-md-8 p-2">

                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $user->name}}</h5>
                                                    <p class="card-text"> {!! \Illuminate\Support\Str::limit($user->about, $limit = 150) !!} </p>
                                                    <div class=""><a href="/company/{{ $user->slug }}"><button class="btn btn-outline-warning float-left">View Cataloge</button></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
