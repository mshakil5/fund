<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class FundraiserController extends Controller
{
    public function activeCampaign()
    {
        $data = Campaign::where('user_id', Auth::user()->id)->get();
        return view('user.activecampaign', compact('data'));
    }

    public function fundraiserDonation($id)
    {
        $data = Transaction::where('user_id', $id)->get();
        return view('admin.fundraiser.fundraiserdonation', compact('data','id'));
    }

}
