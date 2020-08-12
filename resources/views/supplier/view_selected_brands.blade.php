@extends('layouts.vendor')

@section('content')
	<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4> View OR Update Select Brands</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            <div class="bg-white shadow p-5">

                <form role="form" method="POST" action="{{ url('/save_brands') }}">

                    @csrf                    
                        <select class="form-control" multiple size="7" name="brand[]">
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" @if (in_array($brand->id, $brand_id)) selected  @endif >{{$brand->name}}</option>
                            @endforeach
                        </select>
                    <br>

                    <input type="submit" value="Submit" class="btn btn-outline-primary w-100">
                </form>
            </div>

        </div>
    </div>
</div>
     
@endsection