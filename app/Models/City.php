<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

       
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
         return $this->belongsTO(Country::class);
    }

    public function street(){
        return $this->hasMany(Street::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    



}
