<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    public function newFundraiser()
    {
        return view('user.new_fundraiser');
    }

    public function activeCampaign()
    {
        return view('user.activecampaign');
    }
}
