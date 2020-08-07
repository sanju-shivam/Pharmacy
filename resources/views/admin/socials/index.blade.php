@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
                <h4>All social Links</h4>
            <div>
            </div>
            <!-- List of Users -->
            
                <div class="row bg-white shadow">
                    <div class="col-md-12 pt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($socials as $social)

                            <tr>
                            <th scope="row">{{ $social->name }}</th>

                                <td>{{ $social->link }}</td>


                                <td><a href="{{ route('socials.edit', $social->id) }}" class="btn btn-outline-primary">Edit</a></td>

                            </tr>
                            
                                @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
