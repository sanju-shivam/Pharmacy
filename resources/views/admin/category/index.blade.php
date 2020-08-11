@extends('layouts.dash')

@section('content')

<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>Update and Delete categorys</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                    <form  action="{{ action('Admin\CategoryController@store')}}" method="POST" class="float-left">
                            
                        @csrf

                        <div class="input-group mb-3 shadow-sm">
                        <input id="name" type="text" name="name" value="" class="form-control" autocomplete="off" placeholder="Category Name">

                        <div class="form-group" style="display: none">
                        <input id="slug" type="text" name="slug" value="" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-info rounded-0">Add</button>

                        </div>
                    
                    </form>
                </div>
            </div>

            <div class="bg-white shadow">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $category)

                        <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name}}</td>
                        <td class="d-flex justify-content-around">

                            <a href="{{ action('Admin\CategoryController@edit', $category->id) }}"><button class="btn btn-primary float-left">Edit</button></a>

                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deleteModal">Delete</button>
                             <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content w-75 m-auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-center">Are you sure you want to delete!</h4>
                                            <h3 class="text-center text-primary">{{ $category->name }}</h3>
                                            <div class="row d-flex justify-content-around">
                                                <form  action="{{ action('Admin\CategoryController@destroy', $category)}}" method="POST" class="float-left">
                                        
                                                    @csrf
                                                
                                                    {{ method_field('DELETE') }}
                                                
                                                    <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                                            
                                                </form>
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success w-100" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>

                        @endforeach
                    
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
     

@endsection
