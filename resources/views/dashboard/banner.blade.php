@extends('layouts.vendor')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h4>All Banners</h4>
            </div>

                <div class="row">
                    <div class="col-md-12 pt-5">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user->banners as $banner)

                            <tr>
                            <td style="width:20%"><img style="max-width:80%" src="/storage/banners/{{ $banner->image}}"></td>
                            <td>{{ $banner->title}}</td>
                            <td class="d-flex justify-content-around">
                                
                                    <a href="{{ route('banners.edit', $banner->id) }}"><button class="btn btn-primary float-left">Edit</button></a>

                                <form  action="{{ action('BannersController@destroy', $banner)}}" method="POST" class="float-left">
                                                
                                    @csrf
                                
                                    {{ method_field('DELETE') }}
                                
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                            
                                </form>

                            </td>
                            </tr>

                            @endforeach
                        
                        </tbody>
                    </table>

                </div>
            </div>
            <div>

                
            </div>
        </div>
    </div>
</div>


@endsection
