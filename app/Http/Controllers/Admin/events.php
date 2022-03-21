<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Traits\saveImage;
use Illuminate\Http\Request;
use App\Models\eventModel;
Use Alert;
use DB;

class events extends Controller
{
       use saveImage;
       public function addevent()
       {
           return view('admin.event.add');
       } 
       public function editevent($id)
       {
           $event = Event::find($id);
           if($event == null)
           {
               return redirect('/dashboard/adminhome');
           }
           if($event == null || empty($event))
           {
              return redirect('dashboard/event/view');
           }
           return view('admin.event.edit',compact('event'));
       }
   
   ########
       public function  insertevent(Request $request)
       {

           if($request->has('image')):
               $image= $this->saveImage($request->file('image'),'events');
           else:
               $image = '';
           endif;
           $this->validate($request,[
               'name'    => 'required',
               'details' => 'required',
           ]);

           $event=new Event();
           $event->name = $request->name;
           $event->details = $request->details;
           $event->image=$image;

           $Result= $event->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }
           return redirect('/dashboard/event/view');
           
       }    
       public function  updateevent(Request $request)
       {

           $id = $request->id;
           $event = Event::find($id);
           $this->validate($request,[
               'name'    => 'required',
               'details' => 'required',
           ]);
           if($request->has('image')):
               if ( $event->image != null ){
                   unlink('assets/images/events'.'/'.  $event->image);
               }
               $image= $this->saveImage($request->file('image'),'events');
           else:
               $image = '';
           endif;

           if($image!='')
           {
               $event->image=$image;

           }
           $event->name = $request->name;
           $event->details = $request->details;

           $Result= $event->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/event/view');


           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');

           $events =DB::table('events')->orderBy('id','DESC')->paginate(10);
           return view('admin.event.view', compact('events'));
       }
   
       
       public function deleteevent($id)
       {
        $event = Event::find($id);
        if($event == null){
            return redirect('/dashboard/event/view');
        }
           if ( $event->image != null )
           {
               unlink('assets/images/events'.'/'.  $event->image);
           }
           if(!empty($event->images))
           {
               $images = explode(",", $event->images);
               foreach ($images as $key=>$Manyimage)
               {
                   if ($key != 0)
                   {
                       if ($Manyimage)
                       {
                           unlink('assets/images/events' . '/' . $Manyimage);
                       }
                   }
               }
           }
           Event::find($id)->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/event/view');
       }
       
      
      
   }
