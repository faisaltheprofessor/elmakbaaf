<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Orderitem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    // public function takingorder(){
    //     return $this->belongsTO(Takingorder::class);
    // }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function cartitemorder(){
    //     return $this->hasMany(Cartitemorder::class);
    // }
  

}
