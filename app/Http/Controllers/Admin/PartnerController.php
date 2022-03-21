<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\partner;
use App\Models\Partners;
use App\Traits\saveImage;
use Illuminate\Http\Request;
Use Alert;
use DB;

class PartnerController extends Controller
{
       use saveImage;
       public function add()
       {
           return view('admin.partners.add');
       } 
       public function edit($id)
       {
           $partner = Partners::find($id);
           if($partner == null){
               return redirect('/dashboard/adminhome');
           }
           return view('admin.partners.edit',compact('partner'));
       }
   
   ########
       public function  insert(Request $request)
       {

           if($request->has('image')):
               $image= $this->saveImage($request->file('image'),'partners');
           else:
               $image = '';
           endif;
           $this->validate($request,[
               'name'    => 'required',
               'link'    => 'required',
               'image'    => 'required',

           ]);

           $partner=new Partners();
           $partner->name = $request->name;
           $partner->link = $request->link;
           $partner->content = $request->content;
           $partner->image=$image;

           $Result= $partner->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }
           return redirect('/dashboard/partners');
           
       }    
       public function  update(Request $request)
       {

           $id = $request->id;
           $partner = Partners::find($id);
           if($partner == null){
               return redirect('/dashboard/adminhome');
           }
           $this->validate($request,[
               'name'    => 'required',
               'link'    => 'required',

           ]);
           if($request->has('image')):
               if ( $partner->image != null ){
                   unlink('assets/images/partners'.'/'.  $partner->image);
               }
               $image= $this->saveImage($request->file('image'),'partners');
           else:
               $image = '';
           endif;

           if($image!='')
           {
               $partner->image=$image;

           }
           $partner->name = $request->name;
           $partner->name = $request->name;
           $partner->link = $request->link;
           $partner->content = $request->content;


           $Result= $partner->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/partners');


           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');

           $partners =DB::table('partners')->orderBy('id','DESC')->paginate(10);
           return view('admin.partners.view', compact('partners'));
       }
   
       
       public function delete($id)
       {
           $partner = Partners::find($id);
           if($partner == null){
               return redirect('/dashboard/adminhome');
           }
           if ( $partner->image != null )
           {
               unlink('assets/images/partners'.'/'.  $partner->image);
           }
           $partner->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/partners');
       }
       
      
      
   }
