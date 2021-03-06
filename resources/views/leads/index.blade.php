@extends('layouts.vendor')

@section('content')


<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>All Leads showing new first</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            <div class="bg-white shadow">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Requirement</th>
                        <th scope="col">Date-Time</th>
                        <th scope="col">Action</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <th scope="row">{{ $lead->id }}</th>
                            <td >{{ $lead->name }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->requirement }}</td>
                            <td>{{ $lead->created_at }}</td>
                        </tr>

                        @endforeach
                    
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>  


@endsection