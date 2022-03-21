<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Result;
use App\Models\User;
use App\Traits\saveImage;
use Illuminate\Http\Request;
use App\Models\eventModel;
Use Alert;
use DB;

class ResultController extends Controller
{
       use saveImage;
       public function add()
       {
           $courses = Course::all();
           return view('admin.result.addResult',compact('courses'));
       } 
//       public function editResult($id)
//       {
//           $event = DB::table('results')->where('id',$id)->get();
//           return view('admin.result.edit',compact('event'));
//       }
       public function view(){
           $courses = Course::all();
           return view('admin.result.view',compact('courses'));

       }
   ########
       public function  insertResult(Request $request)
       {

           $findResult = Result::where('users_course_key',$request->user_id . '-'. $request->course_id);
           if($findResult != null || !empty($findResult)){
               Alert::error('عذرا لقد ادخلت هذه النتيجه من قبل يرجي مسحها لاعاده ادخالها مره أخري  ', 'Error Message');
               return redirect('/dashboard/result_dependent/add');
           }

           $result = new Result();
           $result->user_id = $request->user_id;
           $result->course_id = $request->course_id;
           $result->degree = $request->degree;
           $result->users_course_key =  $request->user_id . '-'. $request->course_id;


           $Result= $result->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/result_dependent/add');

       }    
//       public function  updateResult(Request $request)
//       {
//
//           $id = $request->id;
//           $event = Event::find($id);
//           $this->validate($request,[
//               'name'    => 'required',
//               'details' => 'required',
//           ]);
//           if($request->has('image')):
//               if ( $event->image != null ){
//                   unlink('assets/images/events'.'/'.  $event->image);
//               }
//               $image= $this->saveImage($request->file('image'),'events');
//           else:
//               $image = '';
//           endif;
//
//           if($image!='')
//           {
//               $event->image=$image;
//
//           }
//           $event->name = $request->name;
//           $event->details = $request->details;
//
//           $Result= $event->save();
//
//           if($Result==1)
//           {
//               Alert::success('تم الحفظ بنجاح', 'Success Message');
//
//           }
//           else
//           {
//               Alert::error('هناك خطأ', 'Error Message');
//
//           }
//
//           return redirect('/dashboard/event/view');
//
//
//
//       }
//

       
       public function deleteResult($id)
       {
           $result= Result::find($id);
           if($result == null){
               return redirect('/dashboard/adminhome');
           }
        $result->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/result/view');
       }



    #################AJAX###########################
    function fetch(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('courses_users')
            ->where($select, $value)
            ->get();
        $output = '<option value="">اختر الطالب '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $user = User::find($row->user_id)->fullName;

            $output .= '<option value="'.$row->user_id.'">'. $user.'</option>';
        }
        echo $output;
    }


    function fetchAll(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('results')
            ->where($select, $value)
            ->get();
        $output = '<option value="">اختر الطالب '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $user = User::find($row->user_id)->fullName;

            $output .= '<option value="'.$row->user_id.'">'. $user.'</option>';
        }
        echo $output;
    }
      
   }
