<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuplierPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function Purchese_Manager(User $user){
        return $user->user_type ==='Admin' || $user->user_type ==='Purchese Manager';


    }
}
