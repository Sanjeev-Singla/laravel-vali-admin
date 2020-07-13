<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class Users extends Controller{

    public function register_submit(UserRegisterRequest $request){
    	$data = $request->all();
    	$data["ip"] = $request->ip();
    	$data['password'] = Hash::make($data["password"]);
    	$user = new User($data);
    	$user->save();

    	session()->flash('message', 'Registered Successfully'); 
		session()->flash('alert-class', 'alert-success');

    	return redirect("user/register");
    }

    public function login_submit(UserLoginRequest $request){
    	$user = User::whereEmail($request->email)->first();
    	$token = Str::random(50);
    	if (isset($user)) {
    		if (Hash::check($request->password, $user->password)){

    			$user->token = $token;
    			$user->save();
    			//session()->put("user_token",$token);

    			session()->flash('message', 'Successfully LoggedIn'); 
				session()->flash('alert-class', 'alert-success');
				return redirect("user/login");
			}else{
	    		session()->flash('message', 'Incorrect Password'); 
				session()->flash('alert-class', 'alert-danger');
				return redirect("user/login");
	    	}
    	}else{
    		session()->flash('message', 'Invalid E-Mail'); 
			session()->flash('alert-class', 'alert-danger');
			return redirect("user/login");
    	}
    }
}
