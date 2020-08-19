@extends('layouts.dash')

@section('content')


<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>Edit lead status</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            <div class="bg-white shadow p-5">
    
    
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
                
                <form role="form" method="POST" action="{{url('admin/subscription/update/'.$subcription->id)}}">

                    @csrf


                <div class="form-group">
                    <input type="text" name="name" value="{{ $subcription->name }}" class="form-control" autocomplete="off" placeholder="Name" required>
                    
                </div>

                <div class="form-group">
                    <input type="number" name="price" value="{{ $subcription->price }}" class="form-control " autocomplete="off" placeholder="Price" required>
                
                </div>

                 <div class="form-group">
                    <label>Description /  Details</label>
                    <input type="text" name="desc1" value="{{ $subcription->desc1 }}" class="form-control " placeholder="Feild 1"><br>
                    <input type="text" name="desc2" value="{{ $subcription->desc2 }}" class="form-control " placeholder="Feild 2"><br>
                    <input type="text" name="desc3" value="{{ $subcription->desc3 }}" class="form-control " placeholder="Feild 3"><br>
                    <input type="text" name="desc4" value="{{ $subcription->desc4 }}" class="form-control " placeholder="Feild 4"><br>
                    <input type="text" name="desc5" value="{{ $subcription->desc5 }}" class="form-control " placeholder="Feild 5"><br>
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
     
