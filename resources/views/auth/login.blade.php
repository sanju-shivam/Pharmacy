@extends('layouts.front')

@section('content')


    <main class="main my-5">
        <div class="col-md-4 m-auto">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active w-50 text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sign In</a>
                    <a class="nav-item nav-link w-50 text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>
                </div>
            </nav>
        </div>

        <!-- Log In-->

        <div class="col-md-4 m-auto">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
               
                    <form class="form-signin p-3" method="POST" action="{{ route('login') }}">
                      
                        @csrf
                      
                        <div class="text-center mb-4">
                            <img class="mb-4" src="#" alt="" width="72" height="72">
                            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
                        </div>
               
                        <div class="form-label-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="inputEmail">Email address</label>
                        </div>
               
                        <div class="form-label-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label for="inputPassword">Password</label>
                        </div>

                        <div class="checkbox mb-3 ml-4">
                            <label>
                                <input class="form-check-input" type="checkbox" onclick="myFunction()">

                                    <label class="form-check-label" for="remember">
                                        {{ __('Show Password') }}
                                    </label>
                            </label>
                        </div>
               
                        <div class="checkbox mb-3 ml-4">
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
               
                         <button type="submit" class="btn btn-primary w-100">
                            {{ __('Login') }}
                        </button>
                        <br>

                        <div class="my-2 d-flex justify-content-between">
                            <a href="{{ route('redirect') }}" class="btn btn-outline-info"><i class="fa fa-facebook mr-2"></i>Login with Facebook</a>

                            {{-- <div class="g-signin2" data-onsuccess="onSignIn"></div> --}}
                            <a href="{{ route('google.login')}}" class="btn btn-outline-danger"><i class="fa fa-google mr-2 text-dark"></i>Login with Google</a>
                        </div>
                                
               
                    </form>
                </div>

                <!-- Sign Up -->

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  
                    <form class="form-signup p-3" method="POST" action="{{ route('register') }}">
                        @csrf
                       
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                        </div>
                  
                        <div class="form-label-group">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="name">Company Name</label>
                        </div>

                        <div class="form-label-group" style="display: none">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="slug">Slug</label>
                        </div>
                  
                        <div class="form-label-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label for="inputEmail">Email address</label>
                        </div>
                  
                        <div class="form-label-group">
                           <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required >
                            
                                @error('phone')
                            
                                <span class="invalid-feedback" role="alert">
                            
                                    <strong>{{ $message }}</strong>
                            
                                </span>
                            
                                @enderror

                            <label for="phone">Contact Number</label>
                        </div>
                  
                        <div class="form-label-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label for="inputPassword">Password</label>
                        </div>
                  
                        <div class="form-label-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                                <label for="inputPassword">Repeate Password</label>
                        </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
