<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index()
    {
        $users = Auth::user();

        return view('index', ['users' => $users]);
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $reservation = new Reservation();
        $reservation->user_id = $user->user_id; // استخدام معرف المستخدم المحفوظ
        $reservation->guest_number = $request->guest_number;
        $reservation->datetime = $request->datetime;
        $reservation->save();



        return redirect()->route('order.index');
    }

    
    public function delete($id)
    {
        $res = Reservation::find($id);
        $order = Order::where('reservations_id', $res->reservations_id)->first();
        $order->delete();
        $res->delete();
        return redirect()->route('DashRes');
    }

    public function status($id)
    {
        $res = Reservation::find($id);
        $res->IsActive = true;
        $res->save();
        return redirect()->route('DashRes');
    }

}
