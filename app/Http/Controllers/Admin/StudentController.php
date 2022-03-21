<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\User;
use App\Traits\saveImage;
use App\Models\Faculty;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    use saveImage;
     public function index($sec_id){
         $section = Section::find($sec_id);
         if( isset($section)):
            $students = User::where('section_id',$sec_id)->where('utype','USR')->get();
        else:
            $students="";
         endif;

         $id=0;
         return view('faculty.studentsView',compact('section','students','id'));
     }
     public function profile($id){

         $student = User::find($id);
         if($student == null){
             return redirect('/dashboard/adminhome');
         }
         if($student->utype =="ADM")
         {
             return redirect()->route('adminhome');
         }
         $results = Result::where('user_id',$student->id)->get();

         return view('admin.studentProfile.view',compact('student','results'));
     }
     public function add(){
         $sections= Section::all();
         return view('faculty.addStudent',compact('sections'));
     }


     public function addStudent(Request $request){

        if($request->has('img')):
              $image= $this->saveImage($request->file('img'),'letters');
         else:
             $image = 'defaultuser.png';
         endif;

         $this->validate($request,[
             'name' => ['required', 'string', 'max:255'],
             'fullName' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'phone' => ['string','min:11','max:15'],
             'city' => [ 'string', 'max:255'],
             'area' => [ 'string', 'max:255'],
             'serial_number' => ['required', 'string','unique:users'],
             'year' => ['required', 'numeric'],
             'password' => ['required', 'string', 'min:8'],
             'confirm_password' => ['required|same:password'],
         ]);

         $user=new User();
         $user->name=$request->name;
         $user->fullName=$request->fullName;
         $user->email=$request->email;
         $user->phone=$request->phone;
         $user->city=$request->city;
         $user->area=$request->area;
         $user->serial_number=$request->serial_number;
         $user->year=$request->year;
         $user->section_id=$request->section_id;
         $user->password=Hash::make($request->password);
         $user->img=$image;

         $Result= $user->save();

         if($Result==1)
         {
             Alert::success('تم الحفظ بنجاح', 'Success Message');

         }
         else
         {
             Alert::error('هناك خطأ', 'Error Message');

         }
         if($request->section_id != null || !empty($request->section_id))
             return redirect('/dashboard/students/all/'.$request->section_id);
         else
             return redirect('/dashboard/admin/sections');

     }

    public function edit($id)
    {
        $sections= Section::all();
        $user = User::find($id);
        if($user == null){
            return redirect('/dashboard/adminhome');
        }
        if($user->utype =="ADM")
        {
            return redirect()->route('adminhome');
        }
        if (isset($user) && $user != null){
            return view('faculty.editStudent',compact('sections','user'));
        }else{
            return redirect('/dashboard/sections');
        }

    }
    public function  updated(Request $request)
    {
        $id = $request->id;
        $student = User::find($id);
        if($student == null){
            return redirect('/dashboard/adminhome');
        }
        if($student->utype =="ADM")
        {
            return redirect()->route('adminhome');
        }
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'fullName' => ['required', 'string', 'max:255'],
            'phone' => ['string','min:11','max:15'],
            'city' => [ 'string', 'max:255'],
            'area' => [ 'string', 'max:255'],
            'year' => ['required', 'numeric'],
            'section_id' => ['required', 'numeric'],
        ]);
        if($request->has('img')):
            if ( $student->img != null && $student->img != 'defaultuser.png'){
                unlink('assets/images/letters'.'/'.  $student->img);
            }
            $image= $this->saveImage($request->file('img'),'letters');
        else:
            $image = '';
        endif;
        if($image!='')
        {
            $student->img=$image;
        }

        //UPDATE SERIAL NUMBER
        if ($request->serial_number != $student->serial_number){
            $this->validate($request,[
                'serial_number' => ['required', 'string','unique:users']
            ]);
            $student->serial_number = $request->serial_number;
        }

        //UPDATE EMAIL ADDRESS
        if($request->email != $student->email )
        {
            $this->validate($request,[
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);

            $student->email=$student->email;
        }


//        // PASSWORD CHECK IF USER INSERT NEW PASSWORD OR IT'S OLD
//        if($request->password != $student->password ||  Hash::check($student->password,$request->password) != true)
//        {
//            $student->password=Hash::make($request->password);
//        }

        $student->name = $request->name;
        $student->name=$request->name;
        $student->fullName=$request->fullName;
        $student->phone=$request->phone;
        $student->city=$request->city;
        $student->area=$request->area;
        $student->year=$request->year;
        $student->section_id=$request->section_id;
        $Result= $student->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }

        if($request->section_id != null || !empty($request->section_id))
            return redirect('/dashboard/students/all/'.$request->section_id);
        else
            return redirect('/dashboard/admin/sections');
    }


    public function unRegisteredStudents(){
        $students= User::whereNull('section_id')->where('utype','USR')->get();
        return view('faculty.uncompleteRegisterStudentsView',compact('students'));
    }

    public function deleteStudent($id)
    {
        $student = User::find($id);
        if($student == null){
            return redirect('/dashboard/adminhome');
        }
        if($student->utype =="ADM")
        {
            return redirect()->route('adminhome');
        }
        if ( $student->img != null && $student->img != 'defaultuser.png')
        {
            unlink('assets/images/letters'.'/'.  $student->img);
        }
        $sec_id = $student->section_id;

        $student->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        if($sec_id!= null || !empty($sec_id))
            return redirect('/dashboard/students/all/'.$sec_id);
        else
            return redirect('/dashboard/admin/sections');
    }

}
