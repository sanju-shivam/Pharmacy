@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <h4>Check all the users on platform</h4>

            <!-- List of Users -->
            
                <div class="row bg-white shadow">
                    <div class="col-md-12 pt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($users as $users)

                            <tr>
                            <th scope="row">{{ $users->id }}</th>

                                <td>{{ $users->name }}</td>

                                <td>{{ $users->email }}</td>

                                <td>{{ $users->phone }}</td>

                                <td>{{ implode(', ', $users->roles()->get()->pluck('name')->toArray()) }}</td>
                                
                                <td class="d-flex justify-content-around">

                                    {{-- <a href="/company/{{ $users->slug }}" class="btn btn-outline-primary">View</a> --}}

                                    @can('edit-users')
                                
                                    <a href="{{ route('admin.users.edit', $users->id) }}"><button class="btn btn-primary float-left">Edit</button></a>
                                
                                    @endcan
                                    
                                </td>

                            </tr>
                            
                                @endforeach

                        </tbody>
                    </table>

                    <div class=" d-flex justify-content-around">
                        {{-- {{ $users->links() }}   --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
