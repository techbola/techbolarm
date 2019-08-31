<?php

namespace App\Services;


use App\Models\Menu;

class MenuService
{

    public function getMenuWithCategory(array $restaurantIds)
    {

        $categories = Menu::whereIn('restaurant_id', $restaurantIds)
            ->get()
            ->groupBy('category.name');

        return $categories;

    }

}