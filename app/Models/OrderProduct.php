<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;
class OrderProduct extends Model
{
    use HasFactory;
    protected $guarded = [];


    function product(){
        return $this->belongsTo(Product::class);
    }

}
