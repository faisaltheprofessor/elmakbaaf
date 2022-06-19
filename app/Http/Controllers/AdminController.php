<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;

class AdminController extends Controller
{
  
    public function index()
    {

        return view("Admin.Admin"); 
    }

    //home Part

    public function RegisterUser()
    {
        return view("auth.register");
    }

   
}
