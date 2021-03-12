<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});
/*produits routes */
Route::get('/boutique','ProductsController@index')->name('products.index');
Route::get('/boutique/{slug}','ProductsController@articles')->name('products.articles');
Route::get('/search',"ProductsController@search")->name('products.search');
//Route::get('/articles','ProductsController@articles')->name('products.articles');
/* routes cartes*/
Route::post('/panier/ajouter','CartController@store')->name('cart.store') ;
Route::patch('panier/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('panier/{rowId}','CartController@destroy')->name('cart.destroy');
Route::get('panier','CartController@index')->name("cart.index");
/* pour les pages de paiements*/
Route::get('/paiement','checkoutController@index')->name('checkout.index');
Route::post('/paiement','checkoutController@store')->name('checkout.store') ;
Route::get('/merci','CheckoutController@thankyou')->name('checkout.thankyou');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
