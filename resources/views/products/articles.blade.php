@extends('layout.app')
@section('content')
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                <div class="about_img">
                    <figure><img src="{{asset("storage/".$products->image)}}" alt="img" /></figure>
                </div>
                <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name= "product_id"value="{{$products->id}}">

                    <button type="submit" class="btn btn-outline-danger mt-5 ml-3">ajouter au panier <i class="fa fa-cart"></i> </button>
                </form>

            </div>

            <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                <div class="about_box">
                    <h3>votre produit</h3>
                    <span>{{$products->title}}</span>
                    <p>{!! $products->description !!} </p>

                </div>

        </div>
    </div>
</div>
</div>
@endsection
