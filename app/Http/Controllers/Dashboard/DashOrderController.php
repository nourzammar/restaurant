<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\BillMeal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashOrderController extends Controller
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
            $user = User::where('user_id', $bill->user_id)->first();

            $total = 0;
            foreach ($meals as $meal) {

                $price = $meal->price * $meal->quantity;
                $total += $price;
                // dd($meal);
            }
            $data = [
                'order' => $order,
                'bill' => $bill,
                'meals' => $meals,
                'total' => $total,
                'tax' => 0.1,
                'totalTax' => $total + ($total * 0.1),
                'user' => $user,
            ];
            array_push($data2, $data);
        }
        return view('dashboard.order', compact('data2'));
    }
    public function GetOrderData()
    {
        $orders = Order::all();
        return view('dashboard.order', [
            'orders' => $orders,
        ]);
    }
}
