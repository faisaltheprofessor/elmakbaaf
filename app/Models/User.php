<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'img',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function country(){
        return $this->hasMany(Country::class);
    }

    public function city(){
        return $this->hasMany(City::class);
    }


    public function street(){
        return $this->hasMany(Street::class);
    }

    public function client(){
        return $this->hasMany(Client::class);
    }

    public function phone(){
        return $this->hasMany(Phone::class);
    }

//suplier

    public function catagory(){
        return $this->hasMany(Catagory::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
    
    
    public function orderitem(){
        return $this->hasMany(Orderitem::class);
    }


    public function scountry(){
        return $this->hasMany(Scountry::class);
    }

    
    public function scity(){
        return $this->hasMany(Scity::class);
    }


    public function sstreet(){
        return $this->hasMany(Sstreet::class);
    }

    public function contacts(){
        return $this->hasMany(Contacts::class);
    }

    //online ecomarce
    public function order(){
        return $this->hasMany(Order::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }


    
    public function takingorder(){
        return $this->hasMany(Takingorder::class);
    }

    
    public function cartitemorder(){
        return $this->hasMany(Cartitemorder::class);
    }

    public function invoicecart(){
        return $this->hasMany(Invoicecart::class);
    }

    public function receiptcart(){
        return $this->hasMany(Receiptcart::class);
    }


    
  






}
