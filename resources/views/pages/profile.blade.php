@extends('layouts.front')

@section('content')

    <main class="main">

        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-3 border">
                    <img src="img/1.png" width="200px">
                    <div class="my-4">
                        <form id="requirment-form" class="requirment-form" method="psot" action="action.php">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Complete Name" />
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Your Contact Number" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <select class="requriment-type w-100" name="requriment-type" id="requriment-type">
                                    <option value="Frenchise">PCD Pharma Frenchise</option>
                                    <option value="Frenchise">3rd Party Manufacturing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success w-100">Submit</button>
                            </div>
                        </form>
                    </div>
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


                <div class="col-md-9">

                    <!-- Banner -->
                    <div id="carouselControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/3.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/4.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="my-4">
                        <h3>About Us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit laudantium corporis dolor
                            voluptatum minus velit dolore dolorem alias ipsam nulla!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit laudantium corporis dolor
                            voluptatum minus velit dolore dolorem alias ipsam nulla!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit laudantium corporis dolor
                            voluptatum minus velit dolore dolorem alias ipsam nulla!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit laudantium corporis dolor
                            voluptatum minus velit dolore dolorem alias ipsam nulla!
                        </p>
                    </div>
                    
                    <div class="product-range-slider my-2">
                        <h3>Our Products</h3>
                        <hr>
                        <div class="">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card m-1">
                                            <img src="img/8.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                                    content.</p>
                                            </div>
                                        </div>
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