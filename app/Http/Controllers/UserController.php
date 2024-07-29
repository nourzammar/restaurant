<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    
    public function index(){
        
        return view('users');
    }


 public function store( Request $request){
     $meal = new User();
     $meal->user_id = $request->id;
     $meal->name = $request->name;
     
     $meal->email = $request->email;
     $meal->password = $request->password;
  
     $meal->save();
     return response('inserted'); 
}
}
