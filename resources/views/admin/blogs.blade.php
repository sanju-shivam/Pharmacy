@extends('layouts.dash')

@section('content')


<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>Update and Write Blogs</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                <a href="/blogs/create" class="btn btn-outline-success">Add Blog</a>
                </div>
            </div>

            <div class="bg-white shadow">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($blogs as $blog)

                        <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td style="width:20%"><img style="max-width:80%" src="/storage/cover_images/{{ $blog->cover_image}}"></td>
                        <td>{{ $blog->title}}</td>
                        <td class="d-flex justify-content-around">
                                <a href="{{ route('blogs.edit', $blog->id) }}"><button class="btn btn-primary float-left">Edit</button></a>

                                <a href="{{ route('blogs.show', $blog->slug) }}"><button class="btn btn-success float-left">View Live</button></a>
                        </td>
                        </tr>

                        @endforeach
                    
                    </tbody>
                </table>

                <div class=" d-flex justify-content-around">
                    {{ $blogs->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
     

@endsection
