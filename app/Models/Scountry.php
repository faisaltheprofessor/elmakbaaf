<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scountry extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scity()
    {
        return $this->hasMany(Scity::class);
    }

    public function suplier()
    {
        return $this->hasOne(Suplier::class);
    }

   
}
