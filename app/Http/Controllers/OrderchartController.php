<?php

namespace App\Http\Controllers;

use App\Models\Takingorder;
use Illuminate\Http\Request;
use Carbon\Carbon;


class OrderchartController extends Controller
{
    public function orderchart()
    {  
        
        return view("SalseManagement.OrderChart");
        
    }

    
    function getAllMonths(){
     
        //getting on;y month get empty arrey and push all date
        $month_array = array();
        //pluck to get column
       $order_date = Takingorder::orderBy('created_at','ASC')->pluck('created_at');
    //    $order_dates = json_decode($order_date);
      //  return $order_dates ;
        if(! empty($order_date)){
            foreach($order_date as $order_date){
                //only access date property month
                // $date = new \DateTime($unformated_date->date);
                $month_name= $order_date?->format('F');
                $month_number = $order_date?->format('m');
                // return $month;
                //insert the data inside empty array accociated array key is number value name
                $month_array[$month_number]=$month_name;

            }
        }
          return $month_array;
        //   return $this->getMonthlyClientCount(02);
    }


    function getMonthlyCount($month){
     //firdt you should get the month virabale  here we count the month checking month value 
     $monthly_count = Takingorder::WhereMonth('created_at', $month)->get()->count();
      return   $monthly_count;
      //but we need it for all mont not only one month so we should create loop
    }


    function getMontlyOrderComeData(){
        // get the value frome fuction we created
        $montly_order_come_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        // return  $month_array();
        if(! empty($month_array)){
            //associative array key month number value key name
            foreach($month_array as $month_number => $month_name)
            {
                //call function how many time we hae month
               $montly_order_come_count = $this->getMonthlyCount($month_number);
            //    push to an array
            // each time that this loop run push it  first parameter mont array name decond data of that
               array_push($montly_order_come_count_array, $montly_order_come_count );
               array_push($month_name_array, $month_name);
            }
        }
            // return $month_array = $this->getAllMonths(); 
            //    return $montly_order_come_count_array; 
            $month_array = $this->getAllMonths();
            $montly_order_come_count_array = array(
                'months'=>$month_name_array,
                //chand dana ast order jam mikona
                'order_count_data'=> $montly_order_come_count_array,
                // now we need name as labal and count order as data
            );

        return response()->json($montly_order_come_count_array); 
    }

}
