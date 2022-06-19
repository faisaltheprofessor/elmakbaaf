<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakingorderOrderitem extends Model
{
    use HasFactory;
    protected $guarded = [];


    function orderitem(){
        return $this->belongsTo(Orderitem::class);
    }

  
}
