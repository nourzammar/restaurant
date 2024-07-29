<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\BillMeal;
use App\Models\DineOut;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DineOutController extends Controller
{
    public function index()
    {
        $mainCourses = Meal::where('type', 'main_course')->get();
        $appetizers = Meal::where('type', 'appetizer')->get();
        $drinks = Meal::where('type', 'drink')->get();
        return view('DineOut', compact('mainCourses', 'appetizers', 'drinks'));
    }

    public function store(Request $request)
    {   
        $mealIds = $request->input('selected_meals');
        $quantities = $request->input('quantity');
        $orderTimes = $request->input('order_time');
       
        
        
        if (empty($mealIds) || empty($quantities) || empty($orderTimes)) {
            $missingFields = [];

            if (empty($mealIds)) {
                $missingFields[] = 'selected_meals';
            }

            if (empty($quantities)) {
                $missingFields[] = 'quantity';
            }

            if (empty($orderTimes)) {
                $missingFields[] = 'order_time';
            }

            $errorMessage = 'Missing field(s): ' . implode(', ', $missingFields);
            return response($errorMessage, 400);
        }
        $mealIds = (array) $mealIds; // Ensure $mealIds is an array
        
        $user = Auth::user();
        // dd ($user);
        $bill = new bill;
        $bill->user_id = $user->user_id;
        $bill->tax = 0.1;
        $bill->source = "Dine Out";
        $bill->save();

            $selectedMealsData = [];
    foreach ($mealIds as $key => $mealId) {
        $quantity = $quantities[$mealId];
        if ($quantity > 0) {
            $selectedMealsData[$mealId] = $quantity;  if (isset($orderTimes[$key])) {
                $orderTimes = date('h:i A', strtotime($orderTimes)); // Convert and format the time as a string with AM/PM
              } else {
                $orderTimes = null; // Assign a default value if orderTimes is not set
              }
        }
    }

foreach ($selectedMealsData as $mealId => $quantity) {
    $meal = Meal::where('meal_id', $mealId)->first();
    if ($meal) {
        $billMeal = new BillMeal;
        $billMeal->meal_id = $meal->meal_id;
        $billMeal->bills_id = $bill->id;
        $billMeal->quantity = $quantity;
        $billMeal->price = $meal->price;
        $billMeal->save();
    }
}
// dd($mealIds ,$quantities);

        $order = new DineOut;
        $order->bills_id = $bill->id;
        $order->order_time = $orderTimes;
        $order->IsActive = false;
        $order->save();
        return response()->json(['message' => 'Order sent successfully']);
    }
}