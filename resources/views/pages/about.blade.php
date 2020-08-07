@extends('layouts.front')

@section('content')

    <main class="main">
        <div class="px-3">
            <div class="col-md-12 py-5">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="contct-form p-5 shadow-sm">
                            <h3>Contact Us</h3>
                            @include('leads.create')
                        </div>
                    </div>
                </div>
            </div>
            
        </div>    
    </main>

   
@endsection
