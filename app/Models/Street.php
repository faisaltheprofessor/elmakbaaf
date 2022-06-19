<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Street extends Model
{
    use HasFactory, SoftDeletes;  
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

        
    public function city()
   {
       return $this->belongsTo(City::class);
   }

   public function client()
    {
        return $this->hasOne(Client::class);
    }
    
}
