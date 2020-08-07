@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <h4>Check all the users on platform</h4>
            <div>
                <a href="/admin/team/create" class="btn btn-success">Add Team Member</a>
            </div>
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
                                    <th scope="col">Permission</th>
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
                                
                                    <a href="{{ route('team.edit', $users->id) }}"><button class="btn btn-primary float-left">Edit</button></a>
                                
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
                                                        <form  action="{{ route('team.destroy', $users)}}" method="POST" class="float-left">
                                  
                                                            @csrf
                                                    
                                                            {{ method_field('DELETE') }}
                                                    
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                
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

                    <div class=" d-flex justify-content-around">
                        {{-- {{ $users->links() }}   --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
