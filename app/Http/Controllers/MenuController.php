<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Rules\RestaurantCategoryValidate;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function saveMenuItem(Request $request)
    {

        $postData = $this->validate($request, [
            'restaurantId' => 'required|numeric',
            'item' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required|min:3',
            'category' => ['required', new RestaurantCategoryValidate(\request('restaurantId'))],
        ]);

        $category = Category::where('restaurant_id', $postData['restaurantId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
           'name' => $postData['item'],
           'description' => $postData['description'],
           'price' => $postData['price'],
           'category_id' => $category['id'],
           'restaurant_id' => $postData['restaurantId'],
        ]);

        return response()->json($menu, 201);

    }

}
