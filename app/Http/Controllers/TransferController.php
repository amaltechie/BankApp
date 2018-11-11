<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Statement;
use Auth;

class TransferController extends Controller
{
    public function create() {

        return view('transfer');
    }
    public function update($id) {

        request()->validate([

            'amount' => ['required', 'numeric', 'min:1']
        ]);
        
    	$email = request('email');
    	$amt = request('amount');
    	$stmt1 = new Statement();
    	$stmt2 = new Statement();
    	
    	$rec_id = DB::table('users')->where('email', $email)->value('id');

	    if(!$rec_id) {

    		return redirect('/transfer/create')->with('fail', 'No customer exist with the given id');
    	}

    	$user = User::find($id);
    	$rec = User::find($rec_id);

    	if($user['balance'] < $amt) {

    		return redirect('/transfer/create')->with('fail', 'Insuffissiant Balance');
    	}

        $user->balance = $user['balance'] - $amt;
        $rec->balance = $rec['balance'] + $amt;

        $stmt1->user_id = $id;
        $stmt1->amount = $amt;
        $stmt1->type = 'Transfer to '. $email;
        $stmt1->details = 'Debit';
        $stmt1->balance = $user->balance;

        $stmt2->user_id = $id;
        $stmt2->amount = $amt;
        $stmt2->type = 'Received From to '. $user['email'];
        $stmt2->details = 'Credit';
        $stmt2->balance = $rec->balance;

    	$user->save();
    	$rec->save();
        $stmt1->save();
        $stmt2->save();

        return redirect('/transfer/create')->with('status', 'Transfer Complete');
    }
}
