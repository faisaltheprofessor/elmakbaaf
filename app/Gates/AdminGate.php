<?php
namespace App\Gates;

class AdminGate{
      public function check_admin($user){
            if( $user->user_type ==='Admin'){
                return true;
            }else{
                return false;
            }
      }
}