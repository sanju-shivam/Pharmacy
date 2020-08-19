@extends('layouts.vendor')

@section('content')


<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>Book Subscription</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
     

<div class="container-fluid">
    <div id="main">
        <div class="row">
            <div class="col-md-12 m-auto">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{ session()->get('message') }} 
                    </div>
                @endif
                @if(session()->has('messageDelete'))
                    <div class="alert alert-danger">
                       {{ session()->get('messageDelete') }} 
                    </div>
                @endif
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Detail 1</th>
                        <th>Detail 2</th>
                        <th>Detail 3</th>
                        <th>Detail 4</th>
                        <th>Detail 5</th>
                        <th>Action</th>
                    </tr>
                    <?php $id=1; ?>
                    @foreach($subcriptions as $subcription )
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$subcription->name }}</td>
                            <td>{{$subcription->price}}</td>
                            <td>{{$subcription->desc1}}</td>
                            <td>{{$subcription->desc2}}</td>
                            <td>{{$subcription->desc3}}</td>
                            <td>{{$subcription->desc4}}</td>
                            <td>{{$subcription->desc5}}</td>
                            <td>
                                @if($subcription->booked_or_not($user_id,$subcription->id))
                                    <a href="{{url('Supplier/subscription/Delete/'.$subcription->id)}}" class="btn btn-danger ">Cancle</a>
                                @else
                                    <a href="{{url('Supplier/subscription/Book/'.$subcription->id)}}" class="btn btn-info ">Book</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
     

