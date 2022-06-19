<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Takingorder extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function client(){
        return $this->belongsTo(Client::class);
    }

    // public function orderitem(){
    //     return $this->hasMany(Orderitem::class);
    // }
  

    public function orderitem(){
        return $this->belongsToMany(Orderitem::class, 'takingorder_orderitems')->withPivote('quantity');
    }

    public function takingorder_orderitem(){
        return $this->hasMany(TakingorderOrderitem::class , 'takingorder_id');
    }

 
    
}
