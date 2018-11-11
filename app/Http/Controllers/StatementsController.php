<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Statement;
use Auth;

class StatementsController extends Controller
{
    public function index() {

    	$id = Auth::user()->id;
    	$statements = User::find($id)->statements;

    	return view('statements',['statements' => $statements]);
    }
}
