<?php
namespace App\Gates;

class Purchese_ManagerGate{
      public function check_purchese_manager($user){
            if($user->user_type ==='Purchese Manager' || $user->user_type ==='Admin' ){
                return true;
            }else{
                return false;
            }
      }
}