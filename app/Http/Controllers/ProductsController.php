<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        if(request()->category ){
                $products=Product::with('categories')->whereHas('categories',function($query){
                        $query->where("slug",request()->category);
                })->orderBy('created_at','DESC')->paginate(6);
        }else{
            $products=Product::with('Categories')->orderBy('created_at','DESC')->paginate(6);
        }

        //Product::inRandomOrder()->take(2)->get();
       // dd($products);
        return view('products.index')->with('products',$products);
    }


    public function articles($slug){
        $products=Product::where('slug',$slug)->firstOrFail();
       // dd($products);
        return view('products.articles')->with('products',$products);
    }


    public function search(){
        request()->validate([
            'q'=>'required|min:4'
        ]);
        $q=request()->input('q');
      $products=  Product::where('title','like',"%$q%")
        ->orWhere('description','like',"%$q%")
        ->paginate(6);
        return view('products.search')->with('products',$products);

    }


}
