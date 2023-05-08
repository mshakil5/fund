<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function alltransaction()
    {
        return view('user.alltransaction');
    }


    // charity transaction 
    public function allCharityTransaction()
    {
        return view('charity.alltransaction');
    }
}
