<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/d063168afc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{( '/asset/css/dashboard.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>{{config('app.name', 'Pharma Platform')}}</title>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

     <script>
        if ($(window).width() < 786) {
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "0px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0px";
            }
        } else {
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        }

    </script>

</head>

<body>

    <main>

        <!-- Header -->

        <div class="col-md-12 border-bottom shadow-sm py-2 bg-white main-header">
            <div class="row">
                <div class="col-md-6 logo-column">
                    <a href="#" class="btn btn-outline-dark btn-lg"><i class="fa fa-medkit mr-3"></i>Pharma</a>
                    <button type="button" class="btn btn-lg mx-2" onclick="openNav();"><i class="openbtn fa fa-bars"></i></button>
                </div>
                <div class="col-md-6 profile-link">
                    <div class="d-flex justify-content-end">
                        <ul class="nav nav-pills">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                    {!! \Illuminate\Support\Str::limit( Auth::user()->name, $limit = 10) !!} <span class="caret"></span>
                                </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                        <a class="dropdown-item" href="/dashboard/products">All Prodcuts</a>
                                        <a class="dropdown-item" href="/products/create">Add Products</a>
                                        @if(Auth::user()->slug == "supplier-user")
                                            <a class="dropdown-item" href="{{ route('lead.Supplier') }}">Lead</a>
                                        @endif
                                        @if(Auth::user()->slug == "supplier-user")
                                            <a class="dropdown-item" href="SelectBrands">Select Brands</a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                </li>
                        </ul>
                        <div class="openbtn-mobile">
                            <button type="button" class="btn btn-lg" onclick="openNav()"><i class="fa fa-bars"></i></button>
                        </div>
                            @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- End Header -->

        <!-- Sidebar Navigation -->

        <section>
            <div id="mySidenav" class="sidenav">
                <button type="button" class="btn btn-lg closebtn mx-2" onclick="closeNav()"><i class="fa fa-close"></i></button>
                <div class="links-list">
                    <a href="/dashboard">Dashboard</a>
                    <a href="/dashboard/products">All Prodcuts</a>
                    <a href="/products/create">Add Products</a>
                    @if(Auth::user()->slug == "supplier-user")
                    <a href="{{ route('lead.Supplier') }}">Lead</a>
                    @endif
                    @if(Auth::user()->slug == "supplier-user")
                        <a class="dropdown-item" href="{{ url('/SelectBrands') }}">Select Brands</a>
                    @endif
                    @if(Auth::user()->slug == "supplier-user")
                        <a class="dropdown-item" href="{{ url('/SelectedBrands') }}"> View Selected Brands</a>
                    @endif
                    <a href="{{ url('user/'.Auth::user()->id.'/edit') }}">Edit Profile</a>
                </div>
            </div>

            @yield('content')
            @include('sweetalert::alert')

    <script type="text/javascript">

        $('#title').on('keyup', function() {
            var theTitle = this.value.toLowerCase().trim();
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g,'-and-')
            .replace(/[^a-z0-9]+/g,'-')
            .replace(/\-\-+/g,'-')
            .replace(/^-+|-+&/g,'');

            slugInput.val(theSlug);
        });
    </script>

    <!-- For User Slug -->
   
    <script type="text/javascript">

        $('#name').on('keyup', function() {
            var theName = this.value.toLowerCase().trim();
            slugInput = $('#slug'),
            theSlug = theName.replace(/&/g,'-and-')
            .replace(/[^a-z0-9]+/g,'-')
            .replace(/\-\-+/g,'-')
            .replace(/^-+|-+&/g,'');

            slugInput.val(theSlug);
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
    <script src="https://businessnest.in/asset/js/main.js"></script>
    <script src="https://businessnest.in/asset/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="ab05fcab38e66c00fd31bbac-|49" defer=""></script>
</body>

</html>