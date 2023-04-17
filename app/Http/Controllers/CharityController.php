<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CharityController extends Controller
{
    public function charity()
    {
        $countries = Country::select('id', 'name')->get();
        return view('auth.charityregister', compact('countries'));
    }

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
            'country' => 'required',
            'r_name' => 'required',
            'r_position' => 'required',
            'phone' => 'required',
            'r_phone' => 'required',
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
        dd("controller");
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'r_name' => $data['r_name'],
            'r_position' => $data['r_position'],
            'r_phone' => $data['r_phone'],
            'phone' => $data['phone'],
            'postcode' => $data['postcode'],
            'is_type' => '2',
        ]);
    }

    public function charityregistration(Request $request)
    {
        
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->country = $request->country;
        $data->r_phone = $request->r_phone;
        $data->r_position = $request->r_position;
        $data->r_name = $request->r_name;
        $data->phone = $request->phone;
        $data->postcode = $request->postcode;
        $data->password = Hash::make($request->password);
        $data->is_type = '2';
        $data->save();
        return redirect()->route('login');
    }
}
