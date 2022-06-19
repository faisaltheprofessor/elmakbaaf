<?php

namespace App\Http\Controllers;
use App\Models\ReceiptProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ImportProductController extends Controller
{
    function getAllMonths(){
     
        //getting on;y month get empty arrey and push all date
        $month_array = array();
        //pluck to get column
       $ReceiptProduct_date = ReceiptProduct::orderBy('created_at','ASC')->pluck('created_at');
    //    $ReceiptProduct_dates = json_decode($ReceiptProduct_date);
      //  return $ReceiptProduct_dates ;
        if(! empty($ReceiptProduct_date)){
            foreach($ReceiptProduct_date as $ReceiptProduct_date){
                //only access date property month
                // $date = new \DateTime($unformated_date->date);
                $month_name= $ReceiptProduct_date?->format('F');
                $month_number = $ReceiptProduct_date?->format('m');
                // return $month;
                //insert the data inside empty array accociated array key is number value name
                $month_array[$month_number]=$month_name;

            }
        }
          return $month_array;
        //   return $this->getMonthlyReceiptProductCount(02);
    }


    function getMonthlyCount($month){
     //firdt you should get the month virabale  here we count the month checking month value 
     $monthly_count = ReceiptProduct::WhereMonth('created_at', $month)->get()->count();
      return   $monthly_count;
      //but we need it for all mont not only one month so we should create loop
    }


    function getMontlyImportProductComeData(){
        // get the value frome fuction we created
        $montly_ReceiptProduct_come_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        // return  $month_array();
        if(! empty($month_array)){
            //associative array key month number value key name
            foreach($month_array as $month_number => $month_name)
            {
                //call function how many time we hae month
               $montly_ReceiptProduct_come_count = $this->getMonthlyCount($month_number);
            //    push to an array
            // each time that this loop run push it  first parameter mont array name decond data of that
               array_push($montly_ReceiptProduct_come_count_array, $montly_ReceiptProduct_come_count );
               array_push($month_name_array, $month_name);
            }
        }
            // return $month_array = $this->getAllMonths(); 
            //    return $montly_ReceiptProduct_come_count_array; 
            $month_array = $this->getAllMonths();
            $montly_ReceiptProduct_come_count_array = array(
                'months'=>$month_name_array,
                //chand dana ast ReceiptProduct jam mikona
                'ReceiptProduct_count_data'=> $montly_ReceiptProduct_come_count_array,
                // now we need name as labal and count ReceiptProduct as data
            );

        return response()->json($montly_ReceiptProduct_come_count_array); 
    }
}
