<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("user/register");
});

Route::group(["prefix"=>"user/"],function(){

	Route::get("login",function(){
		
	});
	Route::post("login-submit","users@login_submit");

	Route::get("register",function(){
		return view("users.register");
	});
	Route::post("register-submit","users@register_submit");

});


Route::group(["prefix"=>"admin/"],function(){
	Route::get("/",function(){
		return view("admin.login");
	});
	Route::post("login-submit","adminctrl@login_submit");

	Route::get("home","adminhome@index");
});