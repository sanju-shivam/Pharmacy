@extends('layouts.dash')

@section('content')


<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>Update and Delete banners</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                <a href="/banners/create" class="btn btn-outline-success">Add Banner</a>
                <a href="/" class="btn btn-outline-primary">View</a>
                </div>
            </div>

            <div class="bg-white shadow">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($banners as $banner)

                        <tr>
                        <th scope="row">{{ $banner->id }}</th>
                        <td style="width:20%"><img style="max-width:80%" src="/storage/banners/{{ $banner->image}}"></td>
                        <td>{{ $banner->title}}</td>
                        <td class="d-flex justify-content-around">
                            @can('edit-users')
                                <a href="{{ route('banners.edit', $banner->id) }}"><button class="btn btn-primary float-left">Edit</button></a>
                            @endcan

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
                                                <h2 class="text-center">Are you sure you want to delete this blog!</h2>
                                                <div class="row d-flex justify-content-around">
                                                    <form  action="{{ action('BannersController@destroy', $banner)}}" method="POST" class="float-left">
                                            
                                                        @csrf
                                                    
                                                        {{ method_field('DELETE') }}
                                                    
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                
                                                    </form>
                                                    
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
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
