<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />

    <script src="https://apis.google.com/js/platform.js" async defer></script>  

    <meta name="google-signin-client_id" content="48550834263-blej11j9kvgul8rhigbfqsnde1greqcr.apps.googleusercontent.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/d063168afc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://businessnest.in/asset/css/app.css">

    <script src="https://apis.google.com/js/platform.js" async></script>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <title> {{ config('app.name', 'Pharma Platform') }} </title>

    <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>

<body>
    <div class="col-md-12 bg-blue">
        <div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    
                    <ul class="nav d-flex justify-content-end">
                        <a class="nav-link text-white btn btn-sm" aria-expanded="false" href="#contact">Post your requirment</a>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logins') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logins') }}">{{ __('Register') }}</a>    
                            </li>
                            @endif

                        @else
                            <li class="nav-item dropdown" style="z-index: 9999999999">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @can('access-control')
                                    <a class="dropdown-item" href="/admin">
                                        Admin Panel
                                    </a>
                                    @endcan

                                    @can('supplier')
                                    <a class="dropdown-item" href="/dashboard">
                                        Dashboard
                                    </a>
                                    @endcan

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
                        @endguest

                        <li class="">
                            <a class="nav-link text-white" aria-expanded="false">+91 000000000</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin:0; border-color: #7f7f7f;">
    <div class="col-md-12 sticky-top shadow-sm bg-blue">
                    
        @include('inc.subheader')
                
    </div>  
    @include('sweetalert::alert')
    
    @yield('content')

    <!-- Footer -->

    <div class="text-white border-top bg-blue">
        <div class="container">
            <div class="row">
                <div class="p-4 col-md-3">
                    <h2 class="mb-4">Pharma</h2>
                    <p>
                        A company for whatever you may need, from website prototyping to publishing
                    </p>
                </div>
                <div class="p-4 col-md-3">
                    <h2 class="mb-4">Quick Links</h2>
                    <ul class="list-unstyled text-white">
                        <a href="/" class="text-white">Home</a>
                        <br />
                        <a href="/about" class="text-white">About us</a>
                        <br />
                        <a href="/contact" class="text-white">Contact Us</a>
                        <br />
                        <a href="/career" class="text-white">Career</a>
                        <br />
                        <a href="/cancellation" class="text-white">Cancillation</a>
                        <br />
                        <a href="/faq" class="text-white">FAQs</a>
                        <br>
                        <a href="/blogs" class="text-white">Blogs</a>
                        <br />
                        <a href="/terms-and-conditions" class="text-white">Trems and Condition</a>
                        <br />
                        <a href="/policy" class="text-white">Policy</a>
                        <br />
                        <a href="/disclaimer" class="text-white">Disclaimer</a>
                    </ul>
                </div>
                <div class="p-4 col-md-3">
                    <h2 class="mb-4">Contact</h2>
                    <p>
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 text-muted fa-phone"></i>+246 - 542 550 5462</a>
                    </p>
                    <p>
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 text-muted fa-envelope-o"></i>info@email.com</a>
                    </p>
                    <p>
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 fa-map-marker text-muted"></i>365 Park Street, NY</a>
                    </p>
                </div>
                <div class="p-4 col-md-3">
                    <h2 class="mb-4">Subscribe</h2>
                    <form>
                        <fieldset class="form-group">
                            <label for="InputEmail1">Get our newsletter</label>
                            <input type="email" class="form-control" placeholder="Enter email" />
                        </fieldset>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center">
                        © Copyright 2018 Pharma - All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>

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

    <script src="https://businessnest.in/asset/js/main.js"></script>
   
    <script src="https://businessnest.in/asset/js/bootstrap.bundle.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="ab05fcab38e66c00fd31bbac-|49" defer=""></script>




<script>
$(document).ready(function(){

 $('#productname').keyup(function(){ 
        var query = $(this).val();
        
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         //alert(_token);
        console.log(query);

         $.ajax({
          url: "{{URL::to('search')}}",
          method:"GET",
          data:{query:query},
          success:function(data){
            console.log(data);

            $('#productlist').fadeIn();  
            $('#productlist').html(data);
          }
         });
        }
    });
});
// $("#productname").click(function(){
//   $(".a").removeClass("visible");
// });
$("body").click(function() {
   if ($(".productlist").is(":visible")) {
       $(".productlist").hide();
   }
});

 $(document).on('click', 'li', function(){  
        $('#productname').val($(this).text());  
        $('#productlist').fadeOut();  
    });  
// window.onclick = function(event) {
//   if (event.target == productlist) {
//     productlist.style.display = "none";
//   }
// }
</script>
   



</body>

</html>