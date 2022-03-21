<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\saveImage;
use Illuminate\Http\Request;
use App\Models\serviceModel;
Use Alert;
use DB;

class services extends Controller
{
       use saveImage;
       public function addservice()
       {
           return view('admin.service.add');
       } 
       public function editservice($id)
       {
           $service = DB::table('services')->where('id',$id)->get();
           if($service == null){
               return redirect('/dashboard/adminhome');
           }
           return view('admin.service.edit',compact('service'));
       }
   
   ########
       public function  insertservice(Request $request)
       {

           if($request->has('image')):
               $image= $this->saveImage($request->file('image'),'services');
           else:
               $image = '';
           endif;
           $this->validate($request,[
               'name'    => 'required',
               'details' => 'required',
               'type' => 'required|numeric',
           ]);

           $service=new Service();
           $service->name = $request->name;
           $service->details = $request->details;
           $service->type=$request->type;
           $service->image=$image;

           $Result= $service->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }
           return redirect('/dashboard/service/view');
           
       }    
       public function  updateservice(Request $request)
       {

           $id = $request->id;
           $service = Service::find($id);
           if($service == null){
               return redirect('/dashboard/adminhome');
           }
           $this->validate($request,[
               'name'    => 'required',
               'details' => 'required',
               'type' => 'required|numeric',
           ]);
           if($request->has('image')):
               if ( $service->image != null ){
                   unlink('assets/images/services'.'/'.  $service->image);
               }
               $image= $this->saveImage($request->file('image'),'services');
           else:
               $image = '';
           endif;

           if($image!='')
           {
               $service->image=$image;

           }
           $service->name = $request->name;
           $service->details = $request->details;
           $service->type=$request->type;

           $Result= $service->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/service/view');


           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');

           $services =DB::table('services')->orderBy('id','DESC')->paginate(10);

           return view('admin.service.view', compact('services'));
       }
   
       
       public function deleteservice($id)
       {
        $service= Service::find($id);
           if($service == null){
               return redirect('/dashboard/service/view');
           }
           if ( $service->image != null )
           {
               unlink('assets/images/services'.'/'.  $service->image);
           }
           $service->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/service/view');
       }
       
      
      
   }
