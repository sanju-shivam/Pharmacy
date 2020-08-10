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

                <form role="form" method="POST" action="{{route('admin.leads.update', $lead->id)}}">

                    @csrf
                
                    <div class="form-group">
                        <h4> Type: 
                            {{ $lead->requirement }} - {{ $lead->created_at }}
                        </h4>

                        <input type="text" name="requirement" class="form-control @error('requirement') is-invalid @enderror" autocomplete="off" value="{{ $lead->requirement }}" placeholder="Requirment Type Not Availabe" readonly>
                        
                        @error('requirement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ $lead->name }}" placeholder="Name Not Availabe" required>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="off" value="{{ $lead->phone }}" placeholder="Phone Not Availabe" required>
                    
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ $lead->email }}" placeholder="Email Not Availabe">
                    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>
                    <!-- WE ARE PASSING ID AS A VALUE TO STORE IN DATABASE IN STATUS COLUMN IN LEAD STATUS TABLE -->
                    @foreach($statuses as $status )
                        <div class="py-2">
                            <input type="checkbox" name="stauses[]" value="{{$status->id}}" @if (in_array($status->id, $lead_status_id)) checked  @endif> {{ $status->name }}
                        </div>
                    @endforeach
                    <br>

                    
                        <select class="form-control" multiple size="7" name="brand[]">
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" @if (in_array($brand->id, $lead_brand_id)) selected  @endif >{{$brand->name}}</option>
                            @endforeach
                        </select>
                    <br><br>

                    <button type="submit" class="btn btn-outline-primary w-100">Submit</button>

                    {{ method_field('PUT')}}

                </form>
            </div>

        </div>
    </div>
</div>
     

@endsection
