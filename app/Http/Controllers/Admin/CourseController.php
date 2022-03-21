<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Courses_Users;
use App\Models\Result;
use App\Models\User;
use App\Traits\saveImage;
use App\Models\Faculty;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;



class CourseController extends Controller
{
    use saveImage;

    /**
     * Show Courses that belong to specific section
     * @param $sec_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
     public function index($sec_id){
         $courses= Course::where('section_id',$sec_id)->orderBy('year','ASC')->orderBy('semester','ASC')->get();
         if ($courses ==null){
             redirect('/dashboard/home');
         }
         $section = Section::select('id','name')->where('id',$sec_id)->get();
         if ($section ==null){
             redirect('/dashboard/home');
         }
         $id=0;
         return view('faculty.courseView',compact('courses','section','id'));
     }

    /**
     * Show Students that have Registration to specific Course
     * @param $course_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
     public function allUsers($course_id){
         $course= Course::where('id',$course_id)->first();
         if ($course ==null){
             redirect('/dashboard/home');
         }
         $id=0;
         return view('faculty.courseStudentsView',compact('course','id'));
     }

    /**
     * @param $sec_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
   public function add($sec_id){
           $section = Section::find($sec_id);
       if ($section ==null){
           redirect('/dashboard/home');
       }
           return view('faculty.addCourse',compact('section'));
   }

    /**
     * add new course
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
   public function insert(Request $request){

       $this->validate($request,[
           'name'    => 'required',
           'year' => 'required|numeric',
           'semester' => 'required|numeric',
           'max_degree' => 'required|numeric',
           'min_degree' => 'required|numeric',
           'content' => 'required',


       ]);

       $course = new Course();
       $course->name = $request->name;
       $course->year = $request->year;
       $course->semester = $request->semester;
       $course->max_degree = $request->max_degree;
       $course->min_degree = $request->min_degree;
       $course->content = $request->content;
       $course->section_id = $request->section_id;
       $Result = $course->save();
       if($Result==1)
       {
           Alert::success('تم الحفظ بنجاح', 'Success Message');

       }
       else
       {
           Alert::error('هناك خطأ', 'Error Message');

       }
       return redirect('/dashboard/courses/show/'.$request->section_id);

     }


    public function edit($id)
    {
        $course = Course::find($id);


        if (isset($course) && $course != null){
            return view('faculty.editCourse',['course'=>$course]);
        }else{
            return redirect(route('sitehome'));
        }

    }


    public function  updated(Request $request)
    {
        $id = $request->id;
        $course = Course::find($id);
        if ($course ==null){
            redirect('/dashboard/home');
        }
        $this->validate($request,[
            'name'    => 'required',
            'year' => 'required|numeric',
            'semester' => 'required|numeric',
            'max_degree' => 'required|numeric',
            'min_degree' => 'required|numeric',
            'content' => 'required',
        ]);


        $course->name = $request->name;
        $course->year = $request->year;
        $course->semester = $request->semester;
        $course->max_degree = $request->max_degree;
        $course->min_degree = $request->min_degree;
        $course->content = $request->content;
        $course->section_id = $request->section_id;


        $Result = $course->save();
        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        return redirect('/dashboard/courses/show/'.$request->section_id);

    }


    /**
     * Delete the all Course Data
     * @param $sec_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteCourse($sec_id,$id)
    {
        $course = Course::find( $id)->delete();
        if ($course ==null){
        redirect('/dashboard/home');
        }
        $course->delete();

        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/courses/show/'.$sec_id);
    }


    /**
     * Delete Course Registiration of student
     * @param $course_id
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteStudentRegisterdCourse($course_id,$user_id)
    {
       $course_user= Courses_Users::where('course_id',$course_id)->where('user_id',$user_id)->get();
       if($course_user == null){
           return redirect('/dashboard/home');
       }
       $course_user->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/courses/students/show/'.$course_id);
    }

    public function RegisterStudToCourse(Request $request){

        $this->validate($request,[
            'users_course_key' => 'unique:courses_users'
        ]);
        $courseRegister = new Courses_Users();
        $courseRegister->user_id    =   $request->get('user_id');
        $courseRegister->course_id  =   $request->get('course_id');
        $courseRegister->users_course_key =   $request->get('users_course_key');


        $Result= $courseRegister->save();

        if ($Result)
            return response()->json([
                'status' => true,
                'msg'  =>'تم الحفظ بنجاح'
            ]);
        else
            return response()->json([
                'status' => false,
                'msg'  =>'هناك خطأ في الحفظ يرجي الأعادة مره أخري  '
            ]);

    }
}
