@extends('layouts.vendor')

@section('content')
@include('inc.messages')

<div id="main">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h4>All Products</h4>
            </div>

            <!-- Table For Product List -->
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)

                        <tr>
                        <td style="width:20%"><img style="max-width:60%" src="/storage/products/{{ $product->image}}"></td>
                        <td>{{ $product->title}}</td>
                        <td>{{ $product->statees($product->location) }}</td>
                        <td class="d-flex justify-content-around">

                            <a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-primary float-left">Edit</button></a>

                        <form  action="{{ action('ProductsController@destroy', $product)}}" method="POST" class="float-left">
                                        
                            @csrf
                        
                            {{ method_field('DELETE') }}
                        
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                    
                        </form>

                        </td>
                        </tr>

                        @endforeach
                    
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

@endsection