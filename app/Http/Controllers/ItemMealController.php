<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\itemMeal;
use App\Models\meal;
use Illuminate\Http\Request;

class ItemMealController extends Controller
{
    public function index()
    {
        $items = item::all();
        $meals = meal::all();
        return view('itemMeal', ['items' => $items, 'meals' => $meals]);
    }
    public function store(Request $request)
    {
        $ItemMeal = new itemMeal();
        $ItemMeal->id = $request->id;
        $ItemMeal->item_id = $request->item_id;
        $ItemMeal->meals_id = $request->meals_id;
        $ItemMeal->save();
        return response('inserted');
    }
}
