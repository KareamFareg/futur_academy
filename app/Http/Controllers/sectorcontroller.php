<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sectorModel;
Use Alert;
use DB;

class sectorcontroller extends Controller
{
    public function addsector()
       {
           return view('admin.sector.add');
       } 
       public function editsector($id)
       {
           $service = DB::table('sectors')->where('id',$id)->get();
           return view('admin.sector.edit',compact('service'));
       }
   
   ########
       public function  insertsector(Request $request)
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
   
           $service=new sectorModel();
           $service->name=$request->name;
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
            return redirect('/dashboard/sector/view');
           
       }    
       public function  updatesector(Request $request)
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
        $service=new sectorModel();
        $service->id=$request->id;
        $service->exists = true;
        $service->name=$request->name;
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
            return redirect('/dashboard/sector/view');
           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');
   
           $services =DB::table('sectors')->paginate(10);
           return view('admin.sector.view', compact('services'));
       }
   
       
       public function deletesector($id)
       {
        DB::table('sectors')->where('id', $id)->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/sector/view');
       }}
