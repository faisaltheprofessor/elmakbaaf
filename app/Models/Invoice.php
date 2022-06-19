<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function user(){
        return $this->belongsTO(User::class);
    }

    public function client(){
        return $this->belongsTO(Client::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    
    public function invoice_product(){
        return $this->hasMany(InvoiceProduct::class , 'invoice_id');
    }



}
