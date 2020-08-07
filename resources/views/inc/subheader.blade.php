<script src="https://kit.fontawesome.com/d063168afc.js" crossorigin="anonymous"></script>
<div class="py-1">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/') }}" style="text-decoration: none;"><h1 class="logo d-flex justify-content-center text-monospace border w-100 rounded-pill shadow-sm bg-white" style="color: #01164d;"><i class="fa fa-medkit text-success mr-2 pt-1"></i> Pharma</h1></a>
        </div>
        <div class="col-md-6">
            <form class="form-inline pt-2" action="{{ route('products.search') }}" method="GET">
                <div class="input-group w-100">

                    <input type="text" name="query" class="form-control @error('text') is-invalid @enderror" autocomplete="off" id="query" placeholder="Search Molecule or Company" value="{{ request()->input('query') }}" required>
                    
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
                
                <li class="">
                    <a href="https://facebook.in" class="btn"><i style="color: white;" class="fab fa-facebook fa-2x"></i></a>
                </li>
                <li class="">
                    <a href="https://web.whatsapp.com" class="btn"><i style="color: white;" class="fab fa-whatsapp fa-2x"></i></a>
                </li>
                <li class="">
                    <a href="https://www.twitter.com" class="btn"><i style="color: white;" class="fab fa-twitter fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>