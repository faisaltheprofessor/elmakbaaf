<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTO(User::class);
    }

 
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    

    public function order_product(){
        return $this->hasMany(OrderProduct::class , 'order_id');
    }


}
