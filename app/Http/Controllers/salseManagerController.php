<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class salseManagerController extends Controller
{
    
    public function ExportProductPerMonth()
    {  
        
        return view("SalseManagement.ExportProduct");
        
    } 

    public function ClientPerMonth()
    {  
        
        return view("SalseManagement.ClientChart");
        
    } 

    public function SalsePerMonth()
    {  
        
        return view("SalseManagement.SalseChart");
        
    } 

    public function OrderPerMonth()
    {  
        
        return view("SalseManagement.OrderChart");
        
    }

    public function index()
    {  
        
        return view("SalseManagement.dashboardSalseManager");
        
    }
    
   


  

}
