@extends('layouts.dash')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8 my-2">
                    <h2>{{ $user->name }}</h2>
                    <p>
                        {{ $user->email }}
                    </p>
                    <p>
                        {{ $user->phone }}
                    </p>
                    <p>
                        {{ $user->address }}
                    </p>
                    <p>
                        @foreach ($roles as $role)
                        
                            <div class="py-2">
                                <div class="form-check">
                                    <label>{{ $role->name }}</label>
                                </div>
                            </div>
                            
                            @endforeach
                    </p>
                </div>
            </div>
            <hr>
        </div>
        </div>

    </div>
</div>

@endsection