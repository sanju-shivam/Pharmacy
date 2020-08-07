@extends('layouts.vendor')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="row">
                <div class="col-md-12">
                <div class="">
                <div class="m-2 p-3 bg-light shadow rounded">Editing profile for {{ $user->name }}</div>
                <div class="mt-3">
                
                <form action="{{ route('company.update', $user->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Company Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            
                        </div>

                        <div class="form-group row" style="display: none">
                            <label for="slug" class="col-md-2 col-form-label text-md-right">Company URL:</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $user->slug }}" required readonly>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
{{-- 
                        <div class="form-group row">
                            <label for="logo" class="col-md-2 col-form-label text-md-right">Company Logo</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="btn btn-outline-dark form-control @error('logo') is-invalid @enderror" name="logo" value="{{ $user->logo }}" autofocus>

                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-2 col-form-label text-md-right">Company CEO(s)</label>

                            <div class="col-md-6">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ $user->owner }}" autofocus placeholder="e.g. Aman Rajput and Bikash Sinha">

                                @error('owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-2 col-form-label text-md-right">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $user->state }}" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employees" class="col-md-2 col-form-label text-md-right">Employees</label>

                            <div class="justify-content-end ml-3">
                                <select name="employees" id="employees" class="btn border rounder">
                                    <option value="1-10">1-10</option>
                                    <option value="11-20">11-20</option>
                                    <option value="21-30">21-30</option>
                                    <option value="31-40">31-40</option>
                                    <option value="41-50">41-50</option>
                                    <option value="51-100">51-100</option>
                                    <option value="101-200">101-200</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-2 col-form-label text-md-right">Establishment Year</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $user->year }}" autofocus>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-2 col-form-label text-md-right">Business Constitution</label>

                            <div class="justify-content-end ml-3">
                                <select name="type" id="type" class="btn border rounder">
                                    <option value="Proprietor">Proprietor</option>
                                    <option value="Private Limited">Private Limited</option>
                                    <option value="Public Company">Public Company</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gstn" class="col-md-2 col-form-label text-md-right">Company's GSTN</label>

                            <div class="col-md-6">
                                <input id="gstn" type="text" class="form-control @error('gstn') is-invalid @enderror" name="gstn" value="{{ $user->gstn }}" autofocus>

                                @error('gstn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment" class="col-md-2 col-form-label text-md-right">Payment Mode</label>

                            <div class="btn">
                                <input type="checkbox" name="payment[]" value="Cash" id="payment" class="btn"> Cash 
                            </div>
                            <div class="btn">
                                <input type="checkbox" name="payment[]" value="Cheque"  id="payment" class="btn"> Cheque
                            </div>
                            <div class="btn">
                                <input type="checkbox" name="payment[]" value="DD"  id="payment" class="btn"> DD
                            </div>
                            <div class="btn">
                                <input type="checkbox" name="payment[]" value="Online"  id="payment" class="btn"> Online
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nature" class="col-md-2 col-form-label text-md-right">Business Constitution</label>

                            <div class="justify-content-end ml-3">
                                <select name="nature" id="nature" class="btn border rounder">
                                    <option value="PCD Pharma Frenchise">PCD Pharma Frenchise</option>
                                    <option value="3rd Party Manufacturing">3rd Party Manufacturing</option>
                                    <option value="PCD Pharma Frenchise & 3rd Party Manufacturing">Both</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="col-md-2 col-form-label text-md-right">About your company</label>

                            <textarea name="about" id="editor" class="">{{ $user->about }}</textarea>
                        </div> --}}
                        
                
                        <!--==================== /////////////// ================-->
                        {{ method_field('PUT')}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                    
                    
                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
