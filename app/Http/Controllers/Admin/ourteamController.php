<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ourteam;
use App\Traits\saveImage;
use Illuminate\Http\Request;
Use Alert;
use DB;

class ourteamController extends Controller
{
       use saveImage;
       public function add()
       {
           return view('admin.ourteam.add');
       } 
       public function edit($id)
       {
           $ourteam = Ourteam::find($id);
           if($ourteam == null){
               return redirect('/dashboard/adminhome');
           }
           return view('admin.ourteam.edit',compact('ourteam'));
       }
   
   ########
       public function  insert(Request $request)
       {

           if($request->has('image')):
               $image= $this->saveImage($request->file('image'),'ourteam');
           else:
               $image = '';
           endif;
           $this->validate($request,[
               'name'    => 'required',
               'position'    => 'required',
               'facebook'    => 'required',
               'twitter'    => 'required',
               'instagram' => 'required',
           ]);

           $ourteam=new Ourteam();
           $ourteam->name = $request->name;
           $ourteam->position = $request->position;
           $ourteam->facebook = $request->facebook;
           $ourteam->twitter = $request->twitter;
           $ourteam->instagram = $request->instagram;
           $ourteam->image=$image;

           $Result= $ourteam->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }
           return redirect('/dashboard/ourteam');
           
       }    
       public function  update(Request $request)
       {

           $id = $request->id;
           $ourteam = Ourteam::find($id);
           if($ourteam == null){
               return redirect('/dashboard/adminhome');
           }
           $this->validate($request,[
               'name'    => 'required',
               'position'    => 'required',
               'facebook'    => 'required',
               'twitter'    => 'required',
               'instagram' => 'required',

           ]);
           if($request->has('image')):
               if ( $ourteam->image != null ){
                   unlink('assets/images/ourteam'.'/'.  $ourteam->image);
               }
               $image= $this->saveImage($request->file('image'),'ourteam');
           else:
               $image = '';
           endif;

           if($image!='')
           {
               $ourteam->image=$image;

           }
           $ourteam->name = $request->name;
           $ourteam->position = $request->position;
           $ourteam->facebook = $request->facebook;
           $ourteam->twitter = $request->twitter;
           $ourteam->instagram = $request->instagram;

           $Result= $ourteam->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/ourteam');


           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');

           $ourteams =DB::table('ourteam')->orderBy('id','DESC')->paginate(10);
           return view('admin.ourteam.view', compact('ourteams'));
       }
   
       
       public function delete($id)
       {
           $team = Ourteam::find($id);
           if($team == null){
               return redirect('/dashboard/adminhome');
           }
           if($team == null){
               return redirect('/dashboard/ourteam');
           }
           if ( $team->image != null )
           {
               unlink('assets/images/ourteam'.'/'.  $team->image);
           }
           $team->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/ourteam');
       }
       
      
      
   }
