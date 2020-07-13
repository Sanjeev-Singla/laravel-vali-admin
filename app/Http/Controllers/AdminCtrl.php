<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

class AdminCtrl extends Controller
{
    public function login_submit(AdminLoginRequest $request){
    	$admin = Admin::whereUsername($request->username)->first();
    	if (isset($admin)) {
    		if ($request->password == $admin->password){
    			//session()->put("admin_token",$token);
    			session()->flash('message', 'Successfully LoggedIn'); 
				session()->flash('alert-class', 'alert-success');
				return redirect("admin/home");
			}else{
	    		session()->flash('message', 'Incorrect Password'); 
				session()->flash('alert-class', 'alert-danger');
				return redirect("admin");
	    	}
    	}else{
    		session()->flash('message', 'Invalid Username'); 
			session()->flash('alert-class', 'alert-danger');
			return redirect("admin");
    	}
    }
}
