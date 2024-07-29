<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class billController extends Controller
{
    public function index()
    {

        return view('bills');
    }
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()) {
            $user = Auth::user();

            $bill = new bill();
            $bill->user_id = $user->id;
            $bill->quantity = $request->quantity;
            $bill->tax = $request->tax;
            $bill->save();
            return response('inserted');
        }
        else
        {
            return view('auth.login');
        }
    }
}
