<?php
namespace App\Gates;

class Salse_ManagerGate{
      public function check_salse_manager($user){
            if($user->user_type ==='Salse Manager' ||  $user->user_type ==='Admin'){
                return true;
            }else{
                return false;
            }
      }
}