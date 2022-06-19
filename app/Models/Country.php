<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;
     
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function city()
   {
       return $this->hasMany(City::class);
   }

     public function client()
    {
        return $this->hasOne(Client::class);
    }

    

}
