<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password))
            return redirect()->back()->withErrors(['Invalid credentials']);

        Auth::login($user, true);

        if (Auth::check() && Auth::user()->ISAdmin == 1) {
            return redirect()->route('DashUser');
        } 
        elseif (Auth::check() && Auth::user()->ISAdmin == 2) {
            return redirect()->route('DashManagWare');
        } 
        elseif (Auth::check() && Auth::user()->ISAdmin == 3) {
            return redirect()->route('chef.index');
        } 
        else {
            return redirect()->route('index.index');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email',
            'password' => 'required|string'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->IsAdmin = false;
        $user->save();
        return redirect()->route('login');
    }
}
