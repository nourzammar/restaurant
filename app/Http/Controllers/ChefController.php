<?php

namespace App\Http\Controllers;
use App\Models\bill;
use App\Models\BillMeal;
use App\Models\meal;
use App\Models\Order;

use Illuminate\Foundation\Auth\User;
use function React\Promise\all;

class ChefController extends Controller
{
    public function index()
    {
        $orders = Order::where('IsActive' , 0)->get();        
        $data = [];
        $data2 = [];
        foreach ($orders as $order) {
            $bill = bill::where('bills_id', $order->bills_id)->first();
            $meals = BillMeal::with('meals')->where('bills_id', $bill->bills_id)->get();
            $user = User::where('user_id', $bill->user_id)->first();

            $data = [
                'order' => $order,
                'bill' => $bill,
                'meals' => $meals,
                'user' => $user,
            ];
            array_push($data2, $data);
        }
        return view('chef' , compact('data2'));
    }
    public function GetBillData()
    {
        $bills = bill::all();
        return view('chef' ,[
            'bills' => $bills,
        ]);
    
    }

}    