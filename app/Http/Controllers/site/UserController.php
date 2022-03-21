<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //
    public function login()
    {
        return view('site.login');
    }
    
    
    public function register()
    {
        return view('site.register');
    } 
    public function registerCustomer()
    {
        return view('site.registerCustomer');
    }
  
    public function logout(Request $request)
    {
       
            Auth::logout();
            return redirect('/');
        
    
    }

    
}
