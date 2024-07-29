<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReserController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('users')->get();
        $users = User::all();
        return view('dashboard.reservation' , compact('reservations') ,compact('users'));
    
       
       
    }
    public function GetReservationData()
    {
        $reservations = Reservation::all();
        $users = User::all();
        return view('dashboard.reservation' ,[
            'reservations' => $reservations,
            'users'=> $users
        ]);
    
    }

}
