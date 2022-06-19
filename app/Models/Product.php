<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];

    // public static function cartCount(){
    //     if(Auth::check()){
    //         echo "user is logged in";
    //     }else{
    //         echo "user is not logged in";
    //     }
    // }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

   // public static function productDiscount($product_id)
   
    public function invoicecart(){
    return $this->hasMany(Invoicecart::class);
    }

    public function receiptcart(){
        return $this->hasMany(Receiptcart::class);
    }


}
