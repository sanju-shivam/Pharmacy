@extends('layouts.front')

@section('content')

    <main class="main">

        <div class="">
            <div class="col-md-12 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 p-5 border">
                            <div class="">
                                <h4>Address</h4>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-5 border">
                            <div class="">
                                <h4>Contact</h4>
                                <p>+91 9999999999 | 99999999999</p>
                                <p>info@email.com</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-5 border">
                            <div class="">
                                <h4>Address</h4>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 py-5">
            <div class="row">
                <div class="col-md-6">
                    <div style="width: 100%">
                        <iframe width="100%" height="400"
                            src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a
                                href="https://www.maps.ie/draw-radius-circle-map/">Radius map tool</a>
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contct-form p-2">
                        <h3>Contact Us</h3>
                        @include('leads.create')
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection