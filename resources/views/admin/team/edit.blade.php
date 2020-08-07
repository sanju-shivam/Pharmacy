@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto">
            @include('inc.messages')
            <h4>Check all the users on platform</h4>

            <!-- List of Users -->
            
                <div class="row bg-white shadow">
                    <div class="col-md-12 pt-5">
                        
                        <form class="p-3" method="POST" action="{{ action('Admin\TeamController@update', $user->id) }}">
                        @csrf
                       
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-normal">Editing {{ $user->name }} Team Member</h1>
                        </div>
                  
                        <div class="form-group">

                            <label for="name">User Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group" style="display: none">

                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $user->slug }}" required>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                  
                        <div class="form-group">

                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>
                  
                        <div class="form-group">

                            <label for="phone">Contact Number</label>
                           <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required >
                            
                                @error('phone')
                            
                                <span class="invalid-feedback" role="alert">
                            
                                    <strong>{{ $message }}</strong>
                            
                                </span>
                            
                                @enderror

                        </div>

                        <div class="form-group">

                            <label for="roles">Assin(d) Roles: </label>

                            @foreach ($roles as $role)
                        
                            <div class="py-2">
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label>{{ $role->name }}</label>
                                </div>
                            </div>
                            
                            @endforeach

                        </div>
                        <hr>

                            <button type="submit" class="btn btn-primary">
                                Save User
                            </button>

                            {{ method_field('PUT')}}
                            
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
