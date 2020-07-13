<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminHome extends Controller
{
    public function index(){
    	$data = User::whereStatus(1)->paginate(2); 
    	return view("admin.dashboard",compact('data'));
    }
}
