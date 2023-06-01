<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\ContactMail;
use Session;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Mail;
use Stripe\PaymentIntent;
use App\Models\Transaction;
use App\Models\EventTransaction;
use App\Models\TicketSale;
use App\Models\User;
use App\Models\EmailContent;
use App\Mail\PaymentMail;
use App\Mail\EventPaymentMail;
use App\Mail\ContactFormMail;

class StripeController extends Controller
{
    public function CampaignPyament(Request $request)
    {
        //get campaign details
        $campaign = Campaign::where('id',$request->campaign_id)->first();


        $totalamt = $request->amount;
        $amt = $request->amount - $request->c_amount - $request->tips_amount;

        // Set your Stripe secret key
        Stripe::setApiKey('pk_live_Gx0P9OLtn53jOp5TdChtaONF00LxuoVYFb');

        // Create a PaymentIntent with the required amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => $totalamt * 100, // replace with your desired amount
            'currency' => 'GBP', // replace with your desired currency
            'payment_method' => $request->input('payment_method_id'),
            "description" => "Donation",
            'confirm' => true,
            'confirmation_method' => 'manual',
        ]);


        $stripetopup = new Transaction();
        $stripetopup->date = date('Y-m-d');
        $stripetopup->tran_no = date('his');
        $stripetopup->tran_type = "In";
        $stripetopup->user_id = $request->donor_id;
        $stripetopup->campaign_id = $request->campaign_id;
        $stripetopup->commission = $request->c_amount;
        $stripetopup->tips_percent = $request->tips;
        $stripetopup->tips = $request->tips_amount;
        $stripetopup->amount = $amt;
        $stripetopup->total_amount = $request->amount;
        $stripetopup->token = time();
        if ($request->displaynameshow == "yes") {
            $stripetopup->donation_display_name = "Kind Soul";
            $stripetopup->show_name = "0";
        } else {
            $stripetopup->donation_display_name = $request->displayname;
            $stripetopup->show_name = "1";
        }
        $stripetopup->donation_type = "Campaign";
        $stripetopup->description = "Donation";
        $stripetopup->payment_type = "Stripe";
        $stripetopup->notification = "0";
        $stripetopup->status = "0";
        $stripetopup->save();

        // fundraiser balance update
            $fundraiser = User::find($campaign->user_id);
            $fundraiser->balance =  $fundraiser->balance + $amt;
            $fundraiser->save();
        // fundraiser balance update end

        // campaign total collection update
            $campaign = Campaign::find($request->campaign_id);
            $campaign->total_collection = $campaign->total_collection + $amt;
            $campaign->save();
        // campaign total collection update end

                $adminmail = ContactMail::where('id', 1)->first()->email;
                $contactmail = Auth::user()->email;
                $ccEmails = [$adminmail];
                // $msg = "Campaign Payment confirmation";
                $msg = EmailContent::where('title','=','campaign_donation_email_message')->first()->description;
                if (isset($msg)) {
                    $array['name'] = Auth::user()->name;
                    $array['email'] = Auth::user()->email;
                    $array['subject'] = "Campaign Payment confirmation";
                    $array['message'] = $msg;
                    $array['contactmail'] = $contactmail;
                    Mail::to($contactmail)
                        ->cc($ccEmails)
                        ->send(new ContactFormMail($array));
                }

        // Return the client secret to the frontend
        return response()->json([
            'client_secret' => $paymentIntent->client_secret,
        ]);
    }

    public function charityPyament(Request $request)
    {
        $totalamt = $request->amount;
        $amt = $request->amount - $request->c_amount;

        // Set your Stripe secret key
        Stripe::setApiKey('pk_live_Gx0P9OLtn53jOp5TdChtaONF00LxuoVYFb');

        // Create a PaymentIntent with the required amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => $totalamt * 100, // replace with your desired amount
            'currency' => 'GBP', // replace with your desired currency
            'payment_method' => $request->input('payment_method_id'),
            "description" => "Donation",
            'confirm' => true,
            'confirmation_method' => 'manual',
        ]);


        $stripetopup = new Transaction();
        $stripetopup->date = date('Y-m-d');
        $stripetopup->tran_no = date('his');
        $stripetopup->tran_type = "In";
        $stripetopup->user_id = $request->donor_id;
        $stripetopup->charity_id = $request->charity_id;
        $stripetopup->commission = $request->c_amount;
        $stripetopup->amount = $amt;
        $stripetopup->total_amount = $request->amount;
        $stripetopup->token = time();
        $stripetopup->donation_type = "Charity";
        $stripetopup->description = "Charity Donation";
        $stripetopup->payment_type = "Stripe";
        $stripetopup->notification = "0";
        $stripetopup->status = "0";
        $stripetopup->save();
        // Return the client secret to the frontend
        return response()->json([
            'client_secret' => $paymentIntent->client_secret,
        ]);
    }

    public function eventPyament(Request $request)
    {
        $totalamt = $request->amount;
        $amt = $request->amount - $request->c_amount;

        // Set your Stripe secret key
        Stripe::setApiKey('pk_live_Gx0P9OLtn53jOp5TdChtaONF00LxuoVYFb');

        // Create a PaymentIntent with the required amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => $totalamt * 100, // replace with your desired amount
            'currency' => 'GBP', // replace with your desired currency
            'payment_method' => $request->input('payment_method_id'),
            "description" => "Event Ticket Booking",
            'confirm' => true,
            'confirmation_method' => 'manual',
        ]);

        $sales = new TicketSale();
        $sales->date = date('Y-m-d');
        $sales->tran_no = date('his');
        $sales->user_id = Auth::user()->id;
        $sales->event_id = $request->event_id;
        $sales->commission = $request->c_amount;
        $sales->amount = $amt;
        $sales->total_amount = $request->amount;
        $sales->quantity = $request->quantity;
        $sales->payment_type = "Stripe";
        $sales->user_notification = "0";
        $sales->admin_notification = "0";
        $sales->status = "0";
        $sales->save();

        $event = Event::find($request->event_id);
        $event->available = $event->available-$request->quantity;
        $event->sold = $event->sold+$request->quantity;
        $event->save();


        $stripetopup = new EventTransaction();
        $stripetopup->date = date('Y-m-d');
        $stripetopup->tran_no = date('his');
        $stripetopup->tran_type = "In";
        $stripetopup->user_id = Auth::user()->id;
        $stripetopup->event_id = $request->event_id;
        $stripetopup->commission = $request->c_amount;
        $stripetopup->amount = $amt;
        $stripetopup->total_amount = $request->amount;
        $stripetopup->token = time();
        $stripetopup->description = "Event Payment";
        $stripetopup->payment_type = "Stripe";
        $stripetopup->notification = "0";
        $stripetopup->status = "0";
        $stripetopup->save();
        // Return the client secret to the frontend
        
        $adminmail = ContactMail::where('id', 1)->first()->email;
        $contactmail = Auth::user()->email;
        $ccEmails = [$adminmail];
        $msg = EmailContent::where('title','=','event_payment_email_message')->first()->description;
        
        if (isset($msg)) {
            $array['name'] = Auth::user()->name;
            $array['email'] = Auth::user()->email;
            $array['subject'] = "Event ticket purchase confirmation";
            $array['message'] = $msg;
            $array['contactmail'] = $contactmail;
            Mail::to($contactmail)
                ->cc($ccEmails)
                ->send(new EventPaymentMail($array));
        }
        
        return response()->json([
            'client_secret' => $paymentIntent->client_secret,
        ]);
    }
}
