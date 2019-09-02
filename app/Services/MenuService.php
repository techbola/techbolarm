<?php

namespace App\Services;


use App\Models\Menu;

class MenuService
{

    public function getMenuWithCategory($restaurantId)
    {

        $categories = Menu::where('restaurant_id', $restaurantId)
            ->get()
            ->groupBy('category.name');

        return $categories;

    }

}