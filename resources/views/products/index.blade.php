@extends('layout.app')

@section('slider')

<section class="slider_section">
    <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="images/banner.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption relative">
                        <span>All New Phones </span>
                        <h1>up to 25% Flat Sale</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content
                            <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                        <a class="buynow" href="#">Buy Now</a>
                        <ul class="social_icon">
                            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="images/banner.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption relative">
                        <span>All New Phones </span>
                        <h1>up to 25% Flat Sale</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content
                            <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                        <a class="buynow" href="#">Buy Now</a>
                        <ul class="social_icon">
                            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="images/banner.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption relative">
                        <span>All New Phones </span>
                        <h1>up to 25% Flat Sale</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content
                            <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                        <a class="buynow" href="#">Buy Now</a>
                        <ul class="social_icon">
                            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i class='fa fa-angle-left'></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i class='fa fa-angle-right'></i>
        </a>
    </div>
</section>


@endsection


@section('content')

<div class="brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>nos Categories</h2>


                </div>
            </div>
        </div>
    </div>

    <div class="brand-bg">


@foreach ($products as $item)



        <div class="container">


            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <span>  @foreach ($item->categories as $category)
                             {{ $category->name }}{{ $loop->last ? '' : ', '}}
                        @endforeach</span>
                        <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        <h3>$<strong class="red">{{$item->getPrice()}}</strong></h3>

                        <span> {!! $item->title !!}</span>
                       <!-- <i><img src="{{$item->image}}"/></i>
                        <i><img src="{{$item->image}}"/></i>
                        <i><img src="{{$item->image}}"/></i>
                        <i><img src="{{$item->image}}"/></i>--->
                        <a href="{{route('products.articles', $item->slug)}}"> <button class="btn btn-info"> voir l'article</button></a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <img src="images/2.png" alt="img" />
                        <h3>$<strong class="red">100</strong></h3>
                        <span>Mobile Phone</span>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <img src="images/3.png" alt="img" />
                        <h3>$<strong class="red">100</strong></h3>
                        <span>Mobile Phone</span>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                    </div>
                </div>
                @endforeach
               <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="brand_box">
                        <img src="images/4.png" alt="img" />
                        <h3>$<strong class="red">100</strong></h3>
                        <span>Mobile Phone</span>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mrgn">
                    <div class="brand_box">
                        <img src="images/5.png" alt="img" />
                        <h3>$<strong class="red">100</strong></h3>
                        <span>Mobile Phone</span>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mrgn">
                    <div class="brand_box">
                        <img src="images/6.png" alt="img" />
                        <h3>$<strong class="red">100</strong></h3>
                        <span>Mobile Phone</span>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                        <i><img src="images/star.png"/></i>
                    </div>
                </div>--->
                <div class="col-md-12">
                    <a class="read-more">See More</a>
                </div>
            </div>
        </div>

    </div>
</div>
{{$products->appends(request()->input())->links()}}
@endsection
