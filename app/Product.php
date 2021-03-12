<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPrice(){
        $prix=$this->price/100;
         return number_format($prix,2,',','')."£";
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
