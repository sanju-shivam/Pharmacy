@extends('layouts.dash')

@section('content')
    
    
<div class="container">
    
    <div id="main">
        <div class="row">
            
            <div class="col-md-12 m-auto">
                <h1>Create Subscription</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{ session()->get('message') }} 
                    </div>
                @endif
                
                <form role="form" method="POST" action="{{url('admin/subscription/store')}}">

                    @csrf


                <div class="form-group">
                    <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Name" required>
                    
                </div>

                <div class="form-group">
                    <input type="number" name="price" class="form-control " autocomplete="off" placeholder="Price" required>
                
                </div>

                 <div class="form-group">
                    <label>Description /  Details</label>
                    <input type="text" name="desc1" class="form-control " placeholder="Feild 1"><br>
                    <input type="text" name="desc2" class="form-control " placeholder="Feild 2"><br>
                    <input type="text" name="desc3" class="form-control " placeholder="Feild 3"><br>
                    <input type="text" name="desc4" class="form-control " placeholder="Feild 4"><br>
                    <input type="text" name="desc5" class="form-control " placeholder="Feild 5"><br>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100">Submit</button>

                </form>
                <div class="my-3">
                </div>
                
            </div>

        </div>
    </div>
</div>

@endsection
     

