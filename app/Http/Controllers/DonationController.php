<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class DonationController extends Controller
{
    public function donationHistory()
    {
        $data = Transaction::where('user_id',Auth::user()->id)->orderby('id','DESC')->get();
        return view('user.donationhistory', compact('data'));
    }
}
