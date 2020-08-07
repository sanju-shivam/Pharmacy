@extends('layouts.vendor')

@section('content') 
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="row">
                <div class="col-md-8">
                    <h4>Build your company's profile</h4>
                    <small>*All Fields Are Mandatory</small>

                </div>
                <div class="col-md-4">
                    <a href="/dashboard"  class="btn btn-outline-info">Cancel and Go Back</a>
                </div>
            </div>
            <hr>
            <form role="form" method="POST"  enctype="multipart/form-data" action="">

            @csrf
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" id="name" name="name" value="" class="form-control" autocomplete="off" placeholder="Your Company Pvt Ltd">
            </div>

            <div class="form-group">
                <label for="file">Company's logo (jpeg,jpg,png,gif):</label>
                <input type="file" name="logo" class="btn btn-outline-dark float-right">
            </div>

            <div class="form-group" style="display: none">
                <label for="slug">Company URL </label>
                <input type="text" id="slug" name="slug" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="owner">Company's Owner Name:</label>
                <input type="text" id="owner" name="owner" value="" class="form-control" autocomplete="off" placeholder="e.g. Ram Krishan and Raghu Chourasia">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="" class="form-control" autocomplete="off" placeholder="Your Company's Registered Address">
            </div>
            
            <div class="form-group border rounded p-1">
                <label for="employees">Total Number of Employees:</label>
                <select name="employees" id="employees" class="w-50 p-1 rounded border btn btn-light float-right">
                    <option value="0-10">0-10</option>
                    <option value="11-20">11-20</option>
                    <option value="21-30">21-30</option>
                    <option value="31-40">31-40</option>
                    <option value="41-50">41-50</option>
                    <option value="51-100">51-100</option>
                </select>
            </div>

            <div class="form-group">
                <label for="year">Address:</label>
                <input type="text" id="year" name="year" value="" class="form-control" autocomplete="off" placeholder="Year of establishment">
            </div>
            
            <div class="form-group border rounded p-1">
                <label for="type">Legal Status of company:</label>
                <select name="type" id="type" class="w-50 p-1 rounded border btn btn-light float-right">
                    <option value="Proprietor">Propritorship</option>
                    <option value="One Person Company">One Person Company</option>
                    <option value="Partnership">Partnership</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gstn">Address:</label>
                <input type="text" id="gstn" name="gstn" value="" class="form-control" autocomplete="off" placeholder="GSTN Only">
            </div>

             <div class="form-group">
                <label for="checkbok">Payment Type (select multiple): </label><br>
                <input type="checkbox" name="checkbox[]" class="checkbox" value="Cash"> Cash
                <input type="checkbox" name="checkbox[]" class="checkbox" value="Cheque"> Cheque
                <input type="checkbox" name="checkbox[]" class="checkbox" value="DD"> DD
                <input type="checkbox" name="checkbox[]" class="checkbox" value="Credit Card"> Credit Card
                <input type="checkbox" name="checkbox[]" class="checkbox" value="Online"> Online
            </div>

            <div class="form-group border rounded p-1">
                <label for="nature">Nature Of Business:</label>
                <select name="nature" id="nature" class="w-50 p-1 rounded border btn btn-light float-right">
                    <option value="PCD Pharma Frenchise">PCD Pharma Frenchis</option>
                    <option value="3rd Party Manufacturing">3rd Party Manufacturing</option>
                </select>
            </div>

            <div class="form-group mt-5">
                <label for="about">About Your Company:</label>
                <textarea type="text" id="editor" name="about" value="" class="form-control" autocomplete="off" placeholder="Short description about your company"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary">Submit</button>

            </form>
            <div class="my-3">
            </div>
            
        </div>

    </div>
</div>
     

@endsection
