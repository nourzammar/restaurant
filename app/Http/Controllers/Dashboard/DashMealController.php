<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\itemMeal;
use App\Models\meal;


class DashMealController extends Controller
{
    public function index()
    {
        $meals = meal::with('media')->get();
        $items= Item::all();
        return view('dashboard.meal' , compact('meals', 'items'));
    }
    public function GetOrderData()
    {
        $meals = meal::all();
        return view('dashboard.meal' ,[
            'meals' => $meals,
        ]);
    }
    public function edit($id)
    {
        $EditMeals = meal::with('items')->find($id);
        $items = $EditMeals->items;
        $allItems = Item::all();
        return view('dashboard.EditMeal', compact('EditMeals' , 'items' , 'allItems'));
    }
    
    public function delete($id)
    {
        $meal = Meal::with('items')->find($id);
        if ($meal) {
            $meal->delete();
            return redirect()->route('DashMeal')->with('success', 'تم حذف الوجبة بنجاح');
        } else {
            return redirect()->route('DashMeal')->with('error', 'لا يمكن العثور على الوجبة المطلوبة');
        }
    } 
}
