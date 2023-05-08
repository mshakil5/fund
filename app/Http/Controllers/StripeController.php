<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Transaction;


class StripeController extends Controller
{
    public function stripePyament(Request $request)
    {
        $amt = $request->amount - $request->c_amount - $request->tips_amount;

        // Set your Stripe secret key
        Stripe::setApiKey('sk_test_51N5D0QHyRsekXzKiOlfECHaMZZbQrelnyJjv2gNbL9YYEdq7LcWl4TLCZGjPStqsPrRCgAlaBTIpLUHl9F9rbtuY00ABjR2fFL');

        // Create a PaymentIntent with the required amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => $amt * 100, // replace with your desired amount
            'currency' => 'GBP', // replace with your desired currency
            'payment_method' => $request->input('payment_method_id'),
            "description" => "Donation",
            'confirm' => true,
            'confirmation_method' => 'manual',
        ]);


        $stripetopup = new Transaction();
        $stripetopup->date = date('Y-m-d');
        $stripetopup->user_id = $request->donor_id;
        $stripetopup->campaign_id = $request->campaign_id;
        $stripetopup->commission = $request->c_amount;
        $stripetopup->tips = $request->tips_amount;
        $stripetopup->amount = $amt;
        $stripetopup->total_amount = $request->amount;
        $stripetopup->donation_display_name = $request->displayname;
        $stripetopup->token = time();
        $stripetopup->description = "Donation";
        $stripetopup->notification = "1";
        $stripetopup->status = "0";
        $stripetopup->save();
        

        // Return the client secret to the frontend
        return response()->json([
            'client_secret' => $paymentIntent->client_secret,
        ]);
    }
}
