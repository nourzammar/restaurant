<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::Check() && Auth::user()->ISAdmin) {
            $users = User::all();
            return view('dashboard.user' , compact('users'));
        } else {
            return view('auth.login');
        }
    }

    public function GetUserData()
    {
        $users = User::all();
        return view('dashboard.user' ,[
            'users' => $users,
        ]);
    }
}
