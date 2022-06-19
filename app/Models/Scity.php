<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scity extends Model
{
    use HasFactory, SoftDeletes;
        
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
         return $this->belongsTO(Scountry::class);
    }

    public function street(){
        return $this->hasMany(Sstreet::class);
    }

    public function suplier()
    {
        return $this->hasOne(Suplier::class);
    }


}
