<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\EventTransaction;
use App\Models\TicketSale;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {

        session(['event_id' => $request->event_id]);

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

            $request->session()->forget('event_id');

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();


                $amount = $arr['transactions'][0]['amount']['total'];

                $payment = new Payment();
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
                $sales->quantity = 1;
                $sales->payment_type = "Paypal";
                $sales->user_notification = "0";
                $sales->admin_notification = "0";
                $sales->status = "0";
                $sales->save();

                // $event = Event::find($request->event_id);
                // $event->available = $event->available-$request->quantity;
                // $event->sold = $event->sold+$request->quantity;
                // $event->save();


                // $stripetopup = new EventTransaction();
                // $stripetopup->date = date('Y-m-d');
                // $stripetopup->tran_no = date('his');
                // $stripetopup->tran_type = "In";
                // $stripetopup->user_id = Auth::user()->id;
                // $stripetopup->event_id = $request->event_id;
                // $stripetopup->commission = $request->c_amount;
                // $stripetopup->amount = $amt;
                // $stripetopup->total_amount = $request->amount;
                // $stripetopup->token = time();
                // $stripetopup->description = "Event Payment";
                // $stripetopup->payment_type = "Stripe";
                // $stripetopup->notification = "0";
                // $stripetopup->status = "0";
                // $stripetopup->save();



                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

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
    }
}
