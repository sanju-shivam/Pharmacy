<script src="https://kit.fontawesome.com/d063168afc.js" crossorigin="anonymous"></script>
<div class="py-1">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/') }}" style="text-decoration: none;"><h1 class="logo d-flex justify-content-center text-monospace border w-100 rounded-pill shadow-sm bg-white" style="color: #01164d;"><i class="fa fa-medkit text-success mr-2 pt-1"></i> Pharma</h1></a>
        </div>
        <div class="col-md-6">
            <form class="form-inline pt-2" action="{{ route('products.search') }}" method="GET">
                <div class="input-group w-100">
                    <div class="form-group">
                        <input type="text" name="title"class="form-control " autocomplete="off" placeholder="Search Product" id="productname" >
                        <div class="a productlist" style="z-index: 1000000 !important;visibility: visible;" id="productlist"></div>
                        {{ csrf_field() }}
                    </div>
                    <div class="input-group-append">

                        <button class="btn btn-outline-success text-white" type="submit">
                            <i class="fa fa-search mr-2"></i>Search
                        </button>
                    </div>
                    
                </div>
                
            </form>

        </div>
        <div class="col-md-3 justify-content-center social-links">
            <ul class="nav d-flex justify-content-center">
                @foreach ($socials as $social)
                    <li class="" >
                        <a href="{{ $social->link }}" class="btn"><i style="color: white;" class="{{ $social->icon }} fa-2x"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>