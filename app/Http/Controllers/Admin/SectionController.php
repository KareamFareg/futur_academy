<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\saveImage;
use App\Models\Faculty;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;



class SectionController extends Controller
{
    use saveImage;
     public function index()
     {
         $sections = Section::orderBy('id','DESC')->get();
         $id=0;
         return view('faculty.sectionView',compact('sections','id'));
     }
     public function add()
     {
         return view('faculty.addSection');
     }
     public function addSection(Request $request)
     {

        if($request->has('image')):
              $image= $this->saveImage($request->file('image'),'sections');
         else:
             $image = '';
         endif;
         if($request->has('icon')):
              $icon= $this->saveImage($request->file('icon'),'sections/icons');
         else:
             $icon = '';
         endif;
         $this->validate($request,[
             'name'    => 'required',
             'details'    => 'required',
         ]);

         $section=new Section();
         $section->name=$request->name;
         $section->details=$request->details;
         $section->image=$image;
         $section->icon=$icon;

         $Result= $section->save();

         if($Result==1)
         {
             Alert::success('تم الحفظ بنجاح', 'Success Message');

         }
         else
         {
             Alert::error('هناك خطأ', 'Error Message');

         }
             return redirect('/dashboard/sections');

     }

    public function edit($id)
    {
        $section = Section::find($id);


        if($section == null){
            return redirect('/dashboard/adminhome');
        }
        if (isset($section) && $section != null){
            return view('faculty.editSection',['section'=>$section]);
        }else{
            return redirect(route('adminhome'));
        }

    }
    public function  updated(Request $request)
    {
        $id = $request->id;
        $section = Section::find($id);
        if($section == null){
            return redirect('/dashboard/adminhome');
        }
        $this->validate($request,[
            'name'    => 'required',
            'details'    => 'required',
        ]);
        if($request->has('image')):
            if ( $section->image != null ){
                unlink('assets/images/sections'.'/'.  $section->image);
            }
            $image= $this->saveImage($request->file('image'),'sections');
        else:
            $image = '';
        endif;

        if($image!='')
        {
            $section->image=$image;

        }

        if($request->has('icon')):
            if ( $section->icon != null ){
                unlink('assets/images/sections/icons'.'/'.  $section->icon);
            }
            $icon= $this->saveImage($request->file('icon'),'sections/icons');
        else:
            $icon = '';
        endif;

        if($icon!='')
        {
            $section->icon=$icon;

        }
        $section->name = $request->name;
        $section->details = $request->details;


        $Result= $section->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }

        return redirect('/dashboard/sections');
    }

    public function deleteSection($id)
    {
        $section=Section::find( $id);
        if($section == null){
            return redirect('/dashboard/adminhome');
        }
        if ( $section->image != null )
        {
            unlink('assets/images/sections'.'/'.  $section->image);
        }
        if ( $section->icon != null )
        {
            unlink('assets/images/sections/icons'.'/'.  $section->icon);
        }
        $section->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/sections');
    }
}
