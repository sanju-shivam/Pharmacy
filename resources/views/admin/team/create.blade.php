@extends('layouts.dash')

@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-8 m-auto">

                <div class="row bg-white shadow">
                    <div class="col-md-12 pt-5">
                        
                        <form class="form-signup p-3" method="POST" action="{{ action('Admin\TeamController@store') }}">
                        @csrf
                       
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-normal">Add Team Member</h1>
                        </div>
                  
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group" style="display: none">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                  
                        <div class="form-group">

                            <label for="inputEmail">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>
                  
                        <div class="form-group">

                            <label for="phone">Contact Number</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required >
                            
                                @error('phone')
                            
                                <span class="invalid-feedback" role="alert">
                            
                                    <strong>{{ $message }}</strong>
                            
                                </span>
                            
                                @enderror

                        </div>
                  
                        <div class="form-label-group">

                                <label for="inputPassword">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>
                  
                        <div class="form-group">

                            <label for="inputPassword">Repeate Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                        </div>

                        <div class="form-group">
                            <label for="roles" class="">Select Roles: </label>

                            @foreach ($roles as $role)
                        
                            <div class="py-2">
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                    <label>{{ $role->name }}</label>
                                </div>
                            </div>
                            
                            @endforeach

                        </div>
                        <hr>
                            <button type="submit" class="btn btn-primary">
                                Create User
                            </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
