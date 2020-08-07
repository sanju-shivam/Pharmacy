@extends('layouts.vendor')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-12">

            <div class="row shadow-sm metrix-numbers d-flex">
                <div class="col-md-4">
                    <div class="">
                        <div class="card text-center bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Number Of Leads</h5>
                                <h2>50+</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="">
                        <div class="card text-center bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Total Brands</h5>
                                <h2>99+</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="">
                        <div class="card text-center bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Subscription Package</h5>
                                <div class="d-flex justify-content-around">
                                    <h2>Current: <small>Free</small></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="col-md-12 p">
                    <div class="row">
                        <div class="col-md-12 pt-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                    <a href="{{ route('company.edit', $user->id) }}"><button class="btn btn-primary float-left mr-3">Edit</button></a>
                                    {{-- <a href="{{ route('company.show', $user->slug) }}"><button class="btn btn-outline-primary float-left">View</button></a> --}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
