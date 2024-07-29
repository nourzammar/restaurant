<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\BillMeal;
use App\Models\meal;
use App\Models\Order;
use Illuminate\Http\Request;

class managerController extends Controller
{
    public function index()
    {
        // $managers = Order::all();
        // $meals = meal::all();
        $orders = Order::all();
        $data = [];
        $data2 = [];
        foreach ($orders as $order) {
            $bill = bill::where('bills_id', $order->bills_id)->first();
            $meals = BillMeal::where('bills_id', $bill->bills_id)->get();
            $total = 0;
            foreach ($meals as $meal) {
                $price = $meal->price * $meal->quantity;
                $total += $price;
            }
            $data = [
                'order' => $order,
                'bill' => $bill,
                'meals' => $meals,
                'total' => $total,
            ];
            array_push($data2 , $data);
        }
        return view('manager', compact('data2'));
    }
    public function store()
    {
    }
}
