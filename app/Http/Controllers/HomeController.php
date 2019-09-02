<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\RestaurantService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MenuService $service, RestaurantService $restaurantService)
    {
        $restaurant_id = 1;

        $menus = $service->getMenuWithCategory($restaurant_id);

        $restaurants = $restaurantService->userRestaurantAndTables();

        return view('home', compact('menus', 'restaurant_id', 'restaurants'));
    }
}
