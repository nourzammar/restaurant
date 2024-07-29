<?php

namespace App\Http\Controllers;

use App\Models\meal;
use Illuminate\Http\Request;

class EditMealController extends Controller
{
    public function updateMeal(Request $request, $id)
    {

        $meal = meal::find($id);

        // التحقق من وجود الوجبة
        if (!$meal) {
            return back()->with('error', 'Meal not found');
        }

        // تحديث البيانات المرسلة من الـ Form
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->save();

        $meal->items()->sync($request->items_ids);
        return response()->json(['message' => 'updated done ']);
    }
}
