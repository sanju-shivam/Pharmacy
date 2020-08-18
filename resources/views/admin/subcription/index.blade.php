@extends('layouts.dash')

@section('content')

<div class="container-fluid">
    <div id="main">
        <div class="row">
            <div class="col-md-12 m-auto">
                 <a href="{{url('admin\subscription\create')}}" class="btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Create</a>
                  <br><br>

                  @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{ session()->get('message') }} 
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
                                <a href="{{url('admin/subscription/edit/'.$subcription->id)}}" class="btn btn-info "><i class="fa fa-pencil"></i> &nbsp;Edit</a>
                                <a href="{{url('admin/subscription/delete/'.$subcription->id)}}" class="btn btn-danger "><i class="fa fa-dustbin"></i> &nbsp;Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
     

