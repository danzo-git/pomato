<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    @yield('meta')
    <!-- site metas -->
    <title>pomato</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset("images/fevicon.png")}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      @yield('extra-script')
</head>

<!--div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
</div-->

<header>
    <!-- header inner -->

    <div class="header">

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo ">
                                <a href="index.html"><img src="{{asset('images/logo.png')}}" alt="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 d-none d-lg-block">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li class="active"> <a href="index.html">Home</a> </li>
                                    <li> <a href="about.html">About</a> </li>
                                    <li><a href="brand.html">Brand</a></li>

                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="{{route("cart.index")}}">panier <span  class="badge-pill badge-dark">{{Cart::count()}}</span></a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-6">
                    <div class="location_icon_bottum">
                        <ul>
                            <li><img src="{{asset('icon/call.png')}}" />(+71)9876543109</li>
                            <li><img src="{{asset('icon/email.png')}}" />demo@gmail.com</li>
                            <li><img src="{{asset('icon/loc.png')}}" />Location</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar <span>  <a href="{{route("cart.index")}}">panier <span  class="badge-pill badge-dark ">{{Cart::count()}}</span></a></span> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                  @foreach (App\Category::all() as $category)
                  <a class="nav-link active" aria-current="page" href="{{route('products.index',['category'=>$category->slug])}}">{{$category->name}}</a>
                </li>
                  @endforeach
                  <li class="last">
                    @include('partials.search')
                 </li>
              <!--li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li--        >
              <!---li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li----->
            </ul>
          </div>
        </div>
      </nav>
</header>
@yield('slider')
<br>
<div class="container">
    @if (session('success'))
    <br>
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
</div>

<div class="container">
    @if (session('danger'))
    <br>
        <div class="alert alert-danger">
            {{session('danger')}}
        </div>
    @endif
</div>

<div class="container">
@if (count($errors)>0)
<div class="alert alert-danger">
   <ul>
       @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
       @endforeach
   </ul>
</div>

@endif

</div>
@if (request()->input())
<h3 class="offset-3">{{$products->total()}} resultat(s) trouvé  pour {{request()->q}}</h3>

@endif
@yield('content')
@yield('extra-js')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
