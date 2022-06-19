<?php
namespace App\Gates;

class Normal_UserGate{
      public function check_normal_user($user){
            if($user->user_type ==='Normal User' ||  $user->user_type ==='Admin'){
                return true;
            }else{
                return false;
            }
      }
}