<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countriesModel;
Use Alert;
use DB;

class countriescontroller extends Controller
{
    public function addcountries()
       {
           return view('admin.countries.add');
       } 
       public function editcountries($id)
       {
           $service = DB::table('countries')->where('id',$id)->get();
           return view('admin.countries.edit',compact('service'));
       }
   
   ########
       public function  insertcountries(Request $request)
       {       
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $images->getClientOriginalExtension();
                    
                    $images->move(public_path('images'), $imageName);
                    $arr = $imageName;
                    $image = '/images/'.($arr);
                else:
                $image = '';
        endif;
   
           $service=new countriesModel();
           $service->Title=$request->name;
           $service->img=$image;
          
   
           $Result= $service->save();
   
           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');
   
           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');
   
           }
            return redirect('/dashboard/countries/view');
           
       }    
       public function  updatecountries(Request $request)
       {
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $images->getClientOriginalExtension();
                    
                    $images->move(public_path('images'), $imageName);
                    $arr = $imageName;
                $image = '/images/'.($arr);
        else:
                $image = '';
        endif;
        $service=new countriesModel();
        $service->id=$request->id;
        $service->exists = true;
        $service->Title=$request->name;
        if($image!='')
        {
        $service->img=$image;
        }
        
        $Result= $service->save();
   
           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');
   
           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');
   
           }
            return redirect('/dashboard/countries/view');
           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');
   
           $services =DB::table('countries')->paginate(10);
           return view('admin.countries.view', compact('services'));
       }
   
       
       public function deletecountries($id)
       {
        DB::table('countriess')->where('id', $id)->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/countries/view');
       }}
