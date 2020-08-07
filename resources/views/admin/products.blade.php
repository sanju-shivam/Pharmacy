@extends('layouts.dash')

@section('content')


<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <h4 class="">{{ $categoryName }}</h4>
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Category to filter
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($categories as $category)
                                    <li class="list-group-item nav-item">
                                        <a href="{{ route('admin.products', ['category' => $category->slug]) }}" class="text-decoration-none text-dark">{{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach     
                            </div>
                        </div>
                        <a href="{{ route('admin.products.export')}}" class="btn btn-outline-info">Export All Product</a>
                        <a href="/products/create" class="btn btn-outline-success">Add Products</a>
                    </div>

                    <div class="row mt-4 float-right">
                        <div class="col-md-12">
                            <div class="">
                                <form role="form" method="POST" action="{{ action('ProductsController@import')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3 bg-white">
                                        <input type="file" name="file" class="btn" title="Select File">
                                        <button type="submit" class="btn btn-success rounded-0">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white shadow">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($products as $product)

                        <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td >{{ $product->title }}</td>
                        {{-- <td >{{ $product->category->name }}</td> --}}
                        <td>{{ implode(', ', $product->category()->get()->pluck('name')->toArray()) }}</td>
                        <td style="width:20%"><img style="max-width:60%" src="/storage/products/{{ $product->image }}"></td>
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary">Edit Product</a>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deleteModal">Delete</button>
                             <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content w-75 m-auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-center">Are you sure you want to delete this blog!</h2>
                                            <div class="row d-flex justify-content-around">
                                                <form  action="{{action('ProductsController@destroy', $product->id)}}" method="POST" class="float-right">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                                
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>

                        @empty

                        <div class="">
                            <div class="p-5 shadow bg-light">
                                <h5>No products found</h5>
                            </div>
                        </div>
                        
                    @endforelse

                    
                    
                    </tbody>
                    
                </table>

                <div class=" d-flex justify-content-around">
                    {{ $products->appends(request()->except('page'))->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
     

@endsection
