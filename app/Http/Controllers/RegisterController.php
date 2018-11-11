<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Account;

class RegisterController extends Controller
{
    public function register() {

    	return view('register');
    }

    public function login() {

    	return view('login');
    }

    public function create() {

    	$data = new Account();
    	
    	$data->name=request('name');
    	$data->email=request('email');
    	$data->password=request('password');

    	$data->save();

    	return $data;
    }

    public function check() {

    	$data = new Account();
    	
    	$data->email=request('email');
    	$data->password=request('password');

    	

    	return $data;
    }
    public function show() {

        return view('welcome');
    }
}
