@extends('layouts.front')

@section('content')

<main id="main">
    <div class="">
        <div class="col-md-12">

            <!-- List of products -->
            
            <div class="row">

            <div class="mx-auto">
                <br>
                <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" style="color: white;">Apply Filters
                    <i class="fa fa-caret-down"></i></button>
            </div>
                <div class="col-md-12 pt-5">

                        <div class="row">
                            <div class="col-md-3">
                                
                                <div class="">
                                    <button class="show-hide btn w-100 btn-dark text-left" type="button">
                                        <i class="fas fa-bars mr-3"></i>Our Product Categories<i
                                            class="fa fa-long-arrow-down ml-3"></i>
                                    </button>
                                    <div class="category-list-item" id="">
                                        <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">

                                @foreach ($categories as $category)

                                <li class="list-group-item nav-item">
                                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-angle-double-right text-primary mr-2"></i>{{ $category->name }}
                                    </a>
                                </li>
                                    
                                @endforeach
                                
                                <a class="btn w-100 btn-success" href="/categories">View All</a>
                            </ul>
                                    </div>
                                </div>
                                <br>



                                <!-- ---------------------------- -->



                                <div class="category-list border">
                                    <button class="show-hide btn w-100 btn-dark text-left" type="button">
                                        <i class="fas fa-bars mr-3"></i>State List<i class="fa fa-long-arrow-down ml-3"></i>
                                    </button>
                                    <div class="category-list-item" id="">
                                        <ul class="list-group list-group-flush navbar-nav" id="collapseCategory">

                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/AndraPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Andra Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/ArunachalPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Arunachal Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Assam')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Assam
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Bihar')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Bihar
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Chhattisgarh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Chhattisgarh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Delhi')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Delhi
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Goa')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Goa
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Gujarat')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Gujarat
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Haryana')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Haryana
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/HimachalPradesh')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Himachal Pradesh
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/JammuandKashmir')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Jammu and Kashmir
                                                </a>
                                            </li>
                                            <li class="list-group-item nav-item">
                                                <a href="{{url('state/Jharkhand')}}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-angle-double-right text-primary mr-2"></i>Jharkhand
                                                </a>
                                            </li>
                                             <a class="btn w-100 btn-success" href="/States">View All</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->



                            <div class="col-md-6 mt-2">
                                
                                @if(empty($filter))
                                <h4>{{ $categoryName }}</h4>
                                @endif

                                @forelse ($products as $product)

                                    <div class="card mb-3 shadow" style="">
                                        <div class="row no-gutters">

                                            <div class="col-md-4 d-flex justify-content-around p-2 border">
                                                <img src="public\products\{{ $product->image }}" class="card-img">
                                            </div>
                                            
                                            <div class="col-md-8 p-2">

                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->title}}</h5>
                                                    <p class="card-text"> {!! \Illuminate\Support\Str::limit($product->text, $limit = 100) !!} </p>
                                                    <div class=""><a href="/products/{{ $product->slug }}"><button class="btn btn-outline-warning float-left">View Product</button></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                @empty

                                    <div class="card">
                                        <div class="card-title p-5 shadow bg-light">
                                            <h5>No products found</h5>
                                        </div>
                                    </div>
                                    
                                @endforelse
                                    
                                    <div class=" d-flex justify-content-around">
                                        <p> {{-- $products->appends(request()->except('page'))->links() --}}<p>
                                    </div>
                                   
                            </div>

                            <div class="col-md-3 border rounded ">
                                <div class="my-4">
                                    <h3>Post your requirement</h3>
                                    @include('leads.create')
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="{{ url('filter/') }}">
                        @csrf
                        <table class="table table-rsponsive">
                            <tr>
                                <label>Category</label>
                                <select class="form-control" name="FilterCategory">
                                    <option value="" >--select--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </tr><br>
                            <tr>
                                <label>State</label>
                                <select name="state" class="form-control ">
                                    <option value="" > --select-- </option>
                                    <option value="andrapradesh">Andra Pradesh</option>
                                    <option value="arunachalpradesh">Arunachal Pradesh</option>
                                    <option value="assam">Assam</option>
                                    <option value="bihar">Bihar</option>
                                    <option value="chhattisgarh">Chhattisgarh</option>
                                    <option value="chandigarh">Chandigarh</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="goa">Goa</option>
                                    <option value="gujarat">Gujarat</option>
                                    <option value="haryana">Haryana</option>
                                    <option value="himachalpradesh">Himachal Pradesh</option>
                                    <option value="jammuandkashmir">Jammu and Kashmir</option>
                                    <option value="jharkhand">Jharkhand</option>
                                    <option value="karnataka">Karnataka</option>
                                    <option value="kerala" >Kerala</option>
                                    <option value="madhyapradesh" >Madhya Pradesh</option>
                                    <option value="maharashtra" >Maharashtra</option>
                                    <option value="manipur" >Manipur</option>
                                    <option value="meghalaya" >Meghalaya</option>
                                    <option value="mizoram" >Mizoram</option>
                                    <option value="magaland" >Nagaland</option>
                                    <option value="orissa" >Orissa</option>
                                    <option value="punjab" >Punjab</option>
                                    <option value="rajasthan" >Rajasthan</option>
                                    <option value="sikkim" >Sikkim</option>
                                    <option value="tamilnadu" >Tamil Nadu</option>
                                    <option value="telagana" >Telagana</option>
                                    <option value="tripura">Tripura</option>
                                    <option value="uttaranchal" >Uttaranchal</option>
                                    <option value="uttarpradesh" >Uttar Pradesh</option>
                                    <option value="westbengal" >West Bengal</option> 
                                </select>
                            </tr>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="Filterr" value="Filter">
                      </div>
                    </form>
                </div>
              </div>
            </div>
</main>
     

@endsection
