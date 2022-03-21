<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Alert;


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
        $r= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string','min:11','max:15'],
            'city' => [ 'string', 'max:255'],
            'area' => [ 'string', 'max:255'],

            'password' => ['required', 'string', 'min:8'],
//            'confirm_password' => ['required|same:password'],
        ]);
        if($r->fails())
        {
            toast(' تاكد من ادخال البيانات بطريقه صحيحه  ', 'success');
            return $r;
        }
        else
        {
            return $r;
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $input)
    {
        $result= User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'fullName' => $input['fullName'],
            'phone' => $input['phone'],
            'city' => $input['city'],
            'area' => $input['area'],
            'img' =>'defaultuser.png',
            'password' => Hash::make($input['password']),
        ]);
        if($result==1)
        {
            Alert::success('تم  إنشاء الحساب بنجاح ', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }

        return $result;
//
//        $result= User::create([
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'phone' => $input['phone'],
//            'city' => $input['city'],
//            'area' => $input['area'],
//            'year' => $input['year'],
//            'serial_number' => $input['serial_number'],
//            'img' => strtoupper(substr($input['name'],0,1)).'.png',
//            'password' => Hash::make($input['password']),
//        ]);
    }
}
