@extends('layouts.front')

@section('content')

    <main class="main">
        <div class="col-md-12 py-5">
            <div class="row">

                <!-- Company Logo And Product Category-->

                <div class="col-md-2">
                    <img src="img/1.png" class="company-logo" width="200px">
                    <div class="pt-4">
                    </div>
                </div>

                <!-- Company Deyalis -->

                <div class="col-md-7">

                    <!-- Company Carousal -->

                    <div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active"> </li>
                            <li data-target="#carouselIndicators" data-slide-to="1"> </li>
                            <li data-target="#carouselIndicators" data-slide-to="2"> </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-moon.svg">
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="carousel-item "> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-dark.svg">
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="carousel-item"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-light.svg">
                                <div class="carousel-caption">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->


                    <div class="pt-5">
                        <h3>About Us</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ad iure delectus adipisci recusandae natus a voluptatibus tempore. Praesentium reiciendis ratione atque, optio sequi culpa repellendus facere commodi ullam inventore!</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ad iure delectus adipisci recusandae natus a voluptatibus tempore. Praesentium reiciendis ratione atque, optio sequi culpa repellendus facere commodi ullam inventore!</p>

                        <div class="products-image">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sticky Form -->

                <div class="col-md-3">
                    <form id="requirment-form" class="requirment-form" method="psot" action="action.php">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Complete Name" value="name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Your Contact Number" value="number">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Your Your Email" value="email">
                        </div>
                        <div class="form-group">
                            <select class="requriment-type w-100" name="requriment-type" id="requriment-type">
                                <option value="Frenchise">PCD Pharma Frenchise</option>
                                <option value="Frenchise">3rd Party Manufacturing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection

