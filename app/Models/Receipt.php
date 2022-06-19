<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function user(){
        return $this->belongsTO(User::class);
    }

    
    public function suplier(){
        return $this->belongsTO(Suplier::class);
    }


    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    
    public function receipt_product(){
        return $this->hasMany(ReceiptProduct::class , 'receipt_id');
    }
}
