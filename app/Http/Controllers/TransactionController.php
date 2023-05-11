<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class TransactionController extends Controller
{
    public function alltransaction()
    {
        $moneyIn = Campaign::with('transaction')->where('user_id', Auth::user()->id)->orderby('id','DESC')->get();
        return view('user.alltransaction',compact('moneyIn'));
    }


    // charity transaction 
    public function allCharityTransaction()
    {
        return view('charity.alltransaction');
    }
}
