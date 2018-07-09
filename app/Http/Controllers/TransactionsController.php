<?php

namespace App\Http\Controllers;

use App\Products;
use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{

    public static function getBalance($id_user = 1)
    {
        $balance = DB::select("select sum(transamount) as totalbalance from (select trans_type * trans_value as transamount from transactions where id_user = {$id_user}) a");
        return $balance;
    }

    public function listTransactions()
    {
        $transactions = DB::table('transactions')->where('id_user', Auth::user()->id)->get();
        return view('transactionHistory')->with('transactions', $transactions);
    }


    public function buynow($id_product)
    {
        $products = Products::where('id_product', $id_product)->get();
        return view('buynow')->with('products', $products);
    }


    public function purchase(Request $request) {
        $transaction = new Transactions();
        $data = array('id_user' => $user_id = Auth::user()->id,
            'trans_type'=>$request['trans_type'],
            'trans_value' => $request['purchase_amount'],
            'trans_description' => $request['trans_description']);
        $transaction->addTransaction($data);
        return redirect('home')->with('success','Successfully Purchased');

    }

}
