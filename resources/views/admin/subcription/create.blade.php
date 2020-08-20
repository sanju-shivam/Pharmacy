@extends('layouts.dash')

@section('content')


<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-6">
                <h1>Create Subscription</h1>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            <div class="bg-white shadow ">

            
                <div class="col-md-12 m-auto">
                    
                   <script type="text/javascript">
                    @if(session()->has('message'))
                           toastr.success("{{ session()->get('message') }}");
                    @endif
                </script>
                    <br>
                    
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
</div>

@endsection
     

