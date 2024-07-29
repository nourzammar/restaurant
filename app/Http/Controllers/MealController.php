<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Meal;
use Illuminate\Http\Request;


class MealController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('meal', compact('items'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $meal = new Meal();
        $meal->meal_id = $request->input('meal_id');
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->type = $request->type;

        $meal->save();

        $meal->items()->syncWithoutDetaching($request->items_ids);

        // رفع الصورة وحفظها
        if ($request->hasFile('photo')) {
            $meal->addMedia($request->photo->path())
                ->usingFileName($request->photo->hashName())
                ->toMediaCollection();
        }



        return redirect()->route('DashMeal');
    }
}
