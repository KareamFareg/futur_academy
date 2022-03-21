<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Alert;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('site.profile');
    }
    public function updateprofile(Request $request)
    {
        $arr='';
        if ($request->hasFile('img')) :
            $images = $request->file('img');
               // foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $images->getClientOriginalExtension();
                    
                    $images->move(public_path('images'), $imageName);
                    $arr = $imageName;
               // endforeach;
                $image = '/images/'.$arr;
        else:
                $image = Auth::user()->img;
        endif;
        $id=Auth::user()->id;
       
        $img=$image;
        $officename=$request->officename;
        $officephone=$request->officephone;
        $phone=$request->phone;
        $city=$request->city;
        $area=$request->area;
        DB::update('update users set  img=?,officename=?, officephone=?,phone=?,city=?, area=? where id=?', [$img,$officename,$officephone,$phone,$city,$area,$id]);
       echo $arr;
       Alert::success('تم الحفظ بنجاح', 'Success Message');

        return redirect('/profile');

    }
   
    
   
    
}
