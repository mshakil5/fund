<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ContactMail;
use App\Models\EmailContent;
use Mail;
use App\Mail\ContactFormMail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => ['required','min:6'],
            'confirm_password' => 'required|same:password',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $msg = EmailContent::where('title','=','user_registration_mail')->first()->description;
        $adminmail = ContactMail::where('id', 1)->first()->email;
        $contactmail = $data['email'];
        $ccEmails = [$adminmail];
            $array['name'] = $data['name'];
            $array['email'] = $data['email'];
            $array['subject'] = "GoGiving registration successfull.";
            $array['message'] = $msg;
            $array['contactmail'] = $contactmail;
            // Mail::to($contactmail)
            //     ->cc($ccEmails)
            //     ->send(new ContactFormMail($array));

            // mail
            $array['name'] = $data['name'];
            $array['message'] = $msg;
            $array['subject'] = "GoGiving registration successfull.";
            $array['from'] = 'do-not-reply@gogiving.co.uk';
            $email = $data['email'];
            $ccEmail = $adminmail;
            $a = Mail::send('emails.register', compact('array'), function($message)use($array,$email) {
                    $message->from($array['from'], 'gogiving.co.uk');
                    $message->to($email)->cc('towhid10@gmail.com')->subject($array['subject']);
            });
        if ($a) {
           
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);
            
        } else {
            return "Error";
        }
        

        



        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'sur_name' => $data['surname'],
        //     'house_number' => $data['house_number'],
        //     'town' => $data['town'],
        //     'street_name' => $data['street_name'],
        //     'phone' => $data['phone'],
        //     'postcode' => $data['postcode'],
        //     'password' => Hash::make($data['password'])
        // ]);
    }

    // protected function create2(array $data)
    // {

    //     $msg = EmailContent::where('title','=','user_registration_mail')->first()->description;
    //     $adminmail = ContactMail::where('id', 1)->first()->email;
    //     $contactmail = $data['email'];
    //     $ccEmails = [$adminmail];
    //         $array['name'] = $data['name'];
    //         $array['email'] = $data['email'];
    //         $array['subject'] = "GoGiving registration successfull.";
    //         $array['message'] = $msg;
    //         $array['contactmail'] = $contactmail;
    //         // Mail::to($contactmail)
    //         //     ->cc($ccEmails)
    //         //     ->send(new ContactFormMail($array));

    //         // mail
    //         $array['name'] = $data['name'],
    //         $array['message'] = $msg,
    //         $array['subject'] = "GoGiving registration successfull.",
    //         $array['from'] = 'do-not-reply@gogiving.co.uk',
    //         $email = $data['email'],
    //         $ccEmail = $adminmail,
    //         Mail::send('emails.register', compact('array'), function($message)use($array,$email) {
    //         $message->from($array['from'], 'gogiving.co.uk');
    //         $message->to($email)->subject($array['subject']);
    //         }),

    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'phone' => $data['phone'],
    //         'password' => Hash::make($data['password']),

            

    //     ]);



    //     // return User::create([
    //     //     'name' => $data['name'],
    //     //     'email' => $data['email'],
    //     //     'sur_name' => $data['surname'],
    //     //     'house_number' => $data['house_number'],
    //     //     'town' => $data['town'],
    //     //     'street_name' => $data['street_name'],
    //     //     'phone' => $data['phone'],
    //     //     'postcode' => $data['postcode'],
    //     //     'password' => Hash::make($data['password'])
    //     // ]);
    // }
}
