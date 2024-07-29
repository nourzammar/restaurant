<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\BillMeal;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $mainCourses = Meal::with('media')->where('type', 'main_course')->get();
        $appetizers = Meal::with('media')->where('type', 'appetizer')->get();
        $drinks = Meal::with('media')->where('type', 'drink')->get();
        return view('order', compact('mainCourses', 'appetizers', 'drinks'));
    }

    public function store(Request $request)
    {
        $mealIds = $request->input('selected_meals');
        $quantities = $request->input('quantity');
        
        $reservation = Reservation::latest()->first();

        $reservationId = $reservation ? $reservation->reservations_id + 1 : 1;
        if ($reservationId == null) {
            return response('Invalid reservation ID', 400);
        }

        if (empty($mealIds) || empty($quantities)) {
            $missingFields = [];

            if (empty($mealIds)) {
                $missingFields[] = 'selected_meals';
            }

            if (empty($quantities)) {
                $missingFields[] = 'quantity';
            }



            $errorMessage = 'Missing field(s): ' . implode(', ', $missingFields);
            return response($errorMessage, 400);
        }

        $mealIds = (array) $mealIds; // Ensure $mealIds is an array

        $user = Auth::user();
        $bill = new bill;
        $bill->user_id = $user->user_id;
        $bill->tax = 0.1;
        $bill->source = "order";
        $bill->save();

        $selectedMealsData = [];
        foreach ($mealIds as $key => $mealId) {
            $quantity = $quantities[$mealId];
            if ($quantity > 0) {
                $selectedMealsData[$mealId] = $quantity;
            }
        }
        foreach ($selectedMealsData as $mealId => $quantity) {
            $meal = Meal::with('items')->where('meal_id', $mealId)->first();
            $items = $meal->items;
            if ($meal) {
                $billMeal = new BillMeal;
                $billMeal->meal_id = $meal->meal_id;
                $billMeal->bills_id = $bill->id;
                $billMeal->quantity = $quantity;
                $billMeal->price = $meal->price;
                $billMeal->save();
            }
            foreach ($items as $item) {
                if ($item->quantity == 0) return response()->json(['message' => 'Can not add meal , no Items Found']);
                $item->quantity -= ($item->mines * $billMeal->quantity);
                $item->save();
            }
        }
        $order = new Order;
        $order->reservations_id = $reservationId;
        $order->bills_id = $bill->id;
        $order->IsActive = false;
        $order->save();
        return response()->json(['message' => 'Order sent successfully']);
    }
}
