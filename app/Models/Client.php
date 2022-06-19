<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
   

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
         return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTO(City::class);
    }

    public function street(){
        return $this->belongsTO(Street::class);
    }

     
    public function phone(){
        return $this->hasMany(Phone::class);
    }
  
    public function takingorder(){
        return $this->hasMany(Takingorder::class);
    }
  
   

}
