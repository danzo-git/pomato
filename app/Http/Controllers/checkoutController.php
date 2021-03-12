<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Stripe\Stripe;
use App\Order;
use DateTime;

use Stripe\PaymentIntent;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0){
            return redirect()->route('products.index');
        }
        Stripe::setApiKey('sk_test_51IKNTeA6eercj2joHmuHTDbnXQl2mG50RjRGjxceHOUcZhZKzshSzN4UGezxCk764TODPOau2zLLo7lPbXtfH3qH00MnItyity');

$intent=PaymentIntent::create([
  'amount' => round(Cart::total()),
  'currency' => 'eur'
/*"metadata"=>[
    'userId'=>15
]*/

]);
$clientSecret=Arr::get($intent,'client_secret');
       return view('checkout.index',['clientSecret'=>$clientSecret]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->json()->all();
       // return $data['paymentIntent']['amount'];
       $order=new Order();
       $order->payment_intent_id=$data['paymentIntent']['id'];
       $order->amount=$data['paymentIntent']['amount'];
       $order->payment_created_at=(new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('y-m-d h:i:s');
$products=[];
$i=0;
foreach (Cart::content() as $product ) {
    $products['products_' .$i][]=$product->model->title;
    $products['products_' .$i][]=$product->model->price;
    $products['products_' .$i][]=$product->qty;
    $i++;
    //$products['products_' .$i][]=$product->model->title;

}
$order->products=serialize($products);
$order->user_id=15;
$order->save();

if ($data['paymentIntent']['status']=='succeeded') {
    Cart::destroy();
    Session()->flash('success', "votre commande a ete traité avec succes ");
        return response()->json(['success'=>'payment Intent Succeeded']);
}
else{
    return response()->json(['error'=>'payment Intent  not Succeeded']);
}


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function thankyou(){

        return Session()->has('success') ? view('checkout.thankyou'):redirect()->route('products.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
