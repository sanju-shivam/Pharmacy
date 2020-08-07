@extends('layouts.dash')

@section('content')

<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <h4>Hello! {{ $user->name }} </h4>
                <div class="row shadow-sm metrix-numbers">
                    
                    <div class="col-md-4">
                        <div class="">
                            <div class="card text-center bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Leads Generated</h5>
                                    <h2>50+</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="">
                            <div class="card text-center bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Total Companies</h5>
                                    <h2>99+</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Products</h5>
                                    <h2>{{ $count }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>
</div>
     

@endsection
