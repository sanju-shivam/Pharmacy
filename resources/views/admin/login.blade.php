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

            {{-- <div class="my-2 d-flex justify-content-between">
                <a href="/login/facebook" class="btn btn-outline-info"><i class="fa fa-facebook mr-2"></i>Login with Facebook</a>

                <a href="/login/google" class="btn btn-outline-danger"><i class="fa fa-google mr-2 text-dark"></i>Login with Google</a>
            </div>
                        --}}
    
        </form>
    </div>
