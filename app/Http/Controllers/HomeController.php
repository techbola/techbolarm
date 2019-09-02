<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MenuService $service)
    {
        $restaurant_id = 1;

        $menus = $service->getMenuWithCategory($restaurant_id);

        return view('home', compact('menus', 'restaurant_id'));
    }
}
