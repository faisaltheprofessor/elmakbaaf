<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suplier extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
         return $this->belongsTo(Scountry::class);
    }

    public function city()
    {
        return $this->belongsTO(Scity::class);
    }

    public function street(){
        return $this->belongsTO(Sstreet::class);
    }
     
    public function contacts(){
        return $this->hasMany(Contacts::class);
    }

    public function catagory()
    {
        return $this->belongsTo(Scatagory::class);
    }

   
}
