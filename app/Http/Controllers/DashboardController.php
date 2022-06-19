<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    { 

    if(Auth()->user()->user_type == 'Normal User'){
        return view('NormalUser.normal_user_Dashboard');  
     }elseif(Auth()->user()->user_type == 'Admin'){
         return view("Admin.Admin"); 
     }elseif(Auth()->user()->user_type == 'Salse Manager'){
        return view("SalseManagement.dashboardSalseManager");
    }elseif(Auth()->user()->user_type == 'Purchese Manager'){
        return view("PurcheseManagement.dashboardPurcheaseManager");
    }else{
        return view("welcome");
    }

    }
/*
    public function SalseManager()
    {     
        return view("SalseManagement.dashboardSalseManager");    
    }
    
    public function PurchaeseManager()
    {          
        return view("PurcheseManagement.dashboardPurcheaseManager");        
    }

    public function main()
    {          
        return view("mainPage");        
    }

    public function index()
    {          
        return view("welcome");        
    }

    */
}
