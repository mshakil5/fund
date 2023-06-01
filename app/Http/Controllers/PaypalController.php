<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Transaction;
use App\Models\Campaign;
use App\Models\EventTransaction;
use App\Models\TicketSale;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentMail;
use App\Mail\ContactFormMail;
use App\Models\EmailContent;
use Mail;
use App\Models\ContactMail;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);
    }

    public function pay(Request $request)
    {
        // test 
        session(['event_id' => $request->event_id]);
        session(['paypalqty' => $request->paypalqty]);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $event_id = session('event_id');
            $paypalqty = session('paypalqty');

            $request->session()->forget('event_id');
            $request->session()->forget('paypalqty');

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $amount = $arr['transactions'][0]['amount']['total'];

                $payment = new Payment();
                $payment->event_id = $event_id;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();

                $sales = new TicketSale();
                $sales->date = date('Y-m-d');
                $sales->tran_no = date('his');
                $sales->user_id = Auth::user()->id;
                $sales->event_id =  $event_id;
                $sales->commission = "00";
                $sales->amount = $amount;
                $sales->total_amount = $amount;
                $sales->quantity = $paypalqty;
                $sales->payment_type = "Paypal";
                $sales->user_notification = "0";
                $sales->admin_notification = "0";
                $sales->status = "0";
                $sales->save();

                $event = Event::find($event_id);
                $event->available = $event->available-$request->quantity;
                $event->sold = $event->sold+$request->quantity;
                $event->save();

                $stripetopup = new EventTransaction();
                $stripetopup->date = date('Y-m-d');
                $stripetopup->tran_no = date('his');
                $stripetopup->tran_type = "In";
                $stripetopup->user_id = Auth::user()->id;
                $stripetopup->event_id = $event_id;
                $stripetopup->commission = $request->c_amount;
                $stripetopup->amount = $request->amount;
                $stripetopup->total_amount = $request->amount;
                $stripetopup->token = time();
                $stripetopup->description = "Event Payment";
                $stripetopup->payment_type = "Paypal";
                $stripetopup->notification = "0";
                $stripetopup->status = "0";
                $stripetopup->save();

                $adminmail = ContactMail::where('id', 1)->first()->email;
                $contactmail = Auth::user()->email;
                $ccEmails = [$adminmail];
                $msg = EmailContent::where('title','=','event_payment_email_message')->first()->description;
                
                if ($msg) {
                    $array['name'] = Auth::user()->name;
                    $array['email'] = Auth::user()->email;
                    $array['subject'] = "Event ticket purchase confirmation";
                    $array['message'] = $msg;
                    $array['contactmail'] = $contactmail;
                    Mail::to($contactmail)
                        ->cc($ccEmails)
                        ->send(new ContactFormMail($array));
                }
                

                $tranid = $arr['id'];
                return view('frontend.paypalsuccess', compact('tranid'));

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
        
        return view('frontend.paypalerror');
    }


    // campaign payment function
    public function campaignpaymentpay(Request $request)
    {
        session(['campaign_id' => $request->campaign_id]);
        session(['paypalcommission' => $request->paypalcommission]);
        session(['paypaltips' => $request->paypaltips]);
        session(['pdisplayname' => $request->pdisplayname]);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('campaign-success'),
                'cancelUrl' => url('campaign-error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function campaignpaymentsuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $campaign_id = session('campaign_id');
            $paypaltips = session('paypaltips');
            $paypalcommission = session('paypalcommission');
            $pdisplayname = session('pdisplayname');

            $request->session()->forget('campaign_id');
            $request->session()->forget('paypaltips');
            $request->session()->forget('paypalcommission');
            $request->session()->forget('pdisplayname');

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $amount = $arr['transactions'][0]['amount']['total'];

                $payment = new Payment();
                $payment->campaign_id = $campaign_id;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();


                $stripetopup = new Transaction();
                $stripetopup->date = date('Y-m-d');
                $stripetopup->tran_no = date('his');
                $stripetopup->tran_type = "In";
                $stripetopup->user_id = Auth::user()->id;
                $stripetopup->campaign_id = $campaign_id;
                $stripetopup->commission = $paypalcommission;
                $stripetopup->tips_percent = "10";
                $stripetopup->tips = $paypaltips;
                $stripetopup->amount = $amount - $paypalcommission - $paypaltips;
                $stripetopup->total_amount = $amount;
                $stripetopup->token = time();
                if ($pdisplayname == "Kind Soul") {
                    $stripetopup->donation_display_name = "Kind Soul";
                    $stripetopup->show_name = "0";
                } else {
                    $stripetopup->donation_display_name = $pdisplayname;
                    $stripetopup->show_name = "1";
                }
                $stripetopup->donation_type = "Campaign";
                $stripetopup->description = "Donation";
                $stripetopup->payment_type = "Paypal";
                $stripetopup->notification = "0";
                $stripetopup->status = "0";
                $stripetopup->save();

                // fundraiser balance update
                    $fundraiser = User::find(Auth::user()->id);
                    $fundraiser->balance =  $fundraiser->balance + $amount - $paypalcommission - $paypaltips;
                    $fundraiser->save();
                // fundraiser balance update end

                // campaign total collection update
                    $campaign = Campaign::find($campaign_id);
                    $campaign->total_collection = $campaign->total_collection + $amount - $paypalcommission - $paypaltips;
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
                

                $tranid = $arr['id'];
                return view('frontend.paypalsuccess', compact('tranid'));

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function campaignpaymenterror()
    {
        return 'User declined the payment!';   
        
        return view('frontend.paypalerror');
    }
}
