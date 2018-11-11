<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Statement;

class WithdrawalController extends Controller
{
    public function create() {

        return view('withdrawal');
    }
    public function update($id) {

        request()->validate([

            'amount' => ['required', 'numeric', 'min:1']
        ]);

    	$amt = request('amount');
    	$user = User::find($id);
        $stmt = new Statement();

        if($user['balance'] < $amt) {

            return redirect('/withdraw/create')->with('fail', 'Insuffissiant Balance'); 
        }

        $user->balance = $user['balance'] - $amt;

        $stmt->user_id = $id;
        $stmt->amount = $amt;
        $stmt->type = 'Withdraw';
        $stmt->details = 'Debit';
        $stmt->balance = $user->balance;

    	$user->save();
        $stmt->save();

        return redirect('/withdraw/create')->with('status', 'Account is debited');
    }
}
