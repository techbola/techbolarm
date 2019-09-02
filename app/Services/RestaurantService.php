<?php

namespace App\Services;


use Illuminate\Support\Facades\Auth;

class RestaurantService
{

    public function userRestaurantAndTables()
    {

        return Auth::user()->restaurants()->get();

    }

}