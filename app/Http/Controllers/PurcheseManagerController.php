<?php

namespace App\Http\Controllers;
use App\Models\Receipt;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PurcheseManagerController extends Controller
{

       
    public function ImportProductPerMonth()
    {  
        
        return view("PurcheseManagement.ImportedProductChart");
        
    } 

          
    public function PurchesePerMonth()
    {  
        
        return view("PurcheseManagement.PurcheseChart");
        
    } 



    public function index()
    {  
        return view("PurcheseManagement.dashboardPurcheaseManager");
        
    }

    // function getAllMonths(){

    //     $month_array = array();
    //    $order_date = Receipt::orderBy('created_at','ASC')->pluck('created_at');
    //     if(! empty($order_date)){
    //         foreach($order_date as $order_date){
    //             $month_name= $order_date?->format('F');
    //             $month_number = $order_date?->format('m');
    //             $month_array[$month_number]=$month_name;

    //         }
    //     }
    //       return $month_array;
    // }


    // function getMonthlyCount($month){
    //  $monthly_count = Receipt::WhereMonth('created_at', $month)->get()->count();
    //   return   $monthly_count;
    // }


    // function getMontlyPurchesesData(){

    //     $montly_order_come_count_array = array();
    //     $month_array = $this->getAllMonths();
    //     $month_name_array = array();
    //     if(! empty($month_array)){
         
    //         foreach($month_array as $month_number => $month_name)
    //         {
                
    //            $montly_order_come_count = $this->getMonthlyCount($month_number);
    //            array_push($montly_order_come_count_array, $montly_order_come_count );
    //            array_push($month_name_array, $month_name);
    //         }
    //     }
    //         // return $month_array = $this->getAllMonths(); 
    //         //    return $montly_order_come_count_array; 
    //         $month_array = $this->getAllMonths();
    //         $montly_order_come_count_array = array(
    //             'months'=>$month_name_array,
    //             //chand dana ast order jam mikona
    //             'order_count_data'=> $montly_order_come_count_array,
    //             // now we need name as labal and count order as data
    //         );

    //     return response()->json($montly_order_come_count_array); 
    // }
}
