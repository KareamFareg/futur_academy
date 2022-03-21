<?php

namespace App\Http\Controllers\Admin;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    //
    public function index()
    {
        if(!Auth::check())
        {
            return view('admin.login');

        }
        else
        {
            return redirect('/dashboard/home');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

   


}
