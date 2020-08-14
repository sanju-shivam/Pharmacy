@extends('layouts.dash')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto">
            
            <div class="row">
                <div class="col-md-8">
                    <h4>Edit Credentials</h4>
                </div>
            </div>
            <hr>

            <form role="form" method="POST" action="{{ url('admin/'.$user->id) }}" >

            @csrf

            <div class="form-group">
                <label for="Name">Name</label>
            <input type="text" name="name" value="{{ $user->name}}" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="Password">Old Password</label>
            <input type="password"  name="oldpassword"  class="form-control">
            </div>

            <div class="form-group">
                <label for="Password"> New Password</label>
            <input type="password"  name="newpassword"  class="form-control">
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email"  name="email" value="{{ $user->email }}"  class="form-control" >
            </div>

          
            <input type="submit" class="btn btn-outline-primary" value="Submit">

            </form>

        </div>
    </div>

</div>
     

@endsection
