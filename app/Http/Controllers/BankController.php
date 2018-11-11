<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Statement;

class BankController extends Controller
{
    public function create() {

        return view('deposit');
    }
    public function update($id) {

        request()->validate([

            'amount' => ['required', 'numeric', 'min:1']
        ]);

        $amt = request('amount');
    	$user = User::find($id);
        $stmt = new Statement();

        $user->balance = $user['balance'] + $amt;

        $stmt->user_id = $id;
        $stmt->amount = $amt;
        $stmt->type = 'Deposit';
        $stmt->details = 'Credit';
        $stmt->balance = $user->balance;

    	$user->save();
        $stmt->save();

        return redirect('/deposit/create')->with('status', 'Money Deposited');
    }
}
