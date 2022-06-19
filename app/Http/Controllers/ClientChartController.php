<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ClientChartController extends Controller
{
    function getAllMonths(){
     
        //getting on;y month get empty arrey and push all date
        $month_array = array();
        //pluck to get column
       $client_date = Client::orderBy('created_at','ASC')->pluck('created_at');
    //    $client_dates = json_decode($client_date);
      //  return $client_dates ;
        if(! empty($client_date)){
            foreach($client_date as $client_date){
                //only access date property month
                // $date = new \DateTime($unformated_date->date);
                $month_name= $client_date?->format('F');
                $month_number = $client_date?->format('m');
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
     $monthly_count = Client::WhereMonth('created_at', $month)->get()->count();
      return   $monthly_count;
      //but we need it for all mont not only one month so we should create loop
    }


    function getMontlyClientComeData(){
        // get the value frome fuction we created
        $montly_client_come_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        // return  $month_array();
        if(! empty($month_array)){
            //associative array key month number value key name
            foreach($month_array as $month_number => $month_name)
            {
                //call function how many time we hae month
               $montly_client_come_count = $this->getMonthlyCount($month_number);
            //    push to an array
            // each time that this loop run push it  first parameter mont array name decond data of that
               array_push($montly_client_come_count_array, $montly_client_come_count );
               array_push($month_name_array, $month_name);
            }
        }
            // return $month_array = $this->getAllMonths(); 
            //    return $montly_client_come_count_array; 
            $month_array = $this->getAllMonths();
            $montly_client_come_count_array = array(
                'months'=>$month_name_array,
                //chand dana ast client jam mikona
                'client_count_data'=> $montly_client_come_count_array,
                // now we need name as labal and count client as data
            );

        return response()->json($montly_client_come_count_array); 
    }

}
