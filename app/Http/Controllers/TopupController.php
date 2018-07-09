<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function topup(Request $request) {
        $transaction = new Transactions();
        $data = array('id_user' => $user_id = Auth::user()->id,
        'trans_type'=>$request['trans_type'],
        'trans_value' => $request['topup_amount'],
        'trans_description' => $request['trans_description']);
        $transaction->addTransaction($data);
        return redirect('home')->with('success','Successfully Topped Up');

    }
}
