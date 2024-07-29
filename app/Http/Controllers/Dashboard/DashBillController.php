<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\BillMeal;
use App\Models\meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashBillController extends Controller
{
    public function index($id)
    {
        $bills = BillMeal::where('bills_id' , $id)->get();
        $meals = [];
        foreach ($bills as $bill)
        {
            $mealName = meal::withTrashed()->where('meal_id' , $bill->meal_id)->first();
            $data = [
                'billMeal' => $bill,
                'meal' => $mealName,
            ];
            array_push($meals , $data);
        }
        return view('dashboard.bill' , compact('meals'));
    }
    public function GetBillData()
    {
        $bills = bill::all();
        return view('dashboard.bill' ,[
            'bills' => $bills,
        ]);
    
    }

    public function ChangeStatus($id)
    {
        $order = Order::find($id);
        $order->IsActive = true;
        $order->save();
        return redirect()->route('chef.index');
    }
}
