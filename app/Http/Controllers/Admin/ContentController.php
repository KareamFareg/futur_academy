<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentModel;
use App\Traits\saveImage;
use App\Models\Faculty;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;



class ContentController extends Controller
{
    use saveImage;
     public function index()
     {
         $contents = ContentModel::orderBy('id','DESC')->get();

         $id=0;
         return view('faculty.ContentView',compact('contents','id'));
     }
     public function add()
     {
         return view('faculty.addSection');
     }
     public function addSection(Request $request)
     {

        if($request->has('image')):
              $image= $this->saveImage($request->file('image'),'contents');
         else:
             $image = '';
         endif;
         $this->validate($request,[
             'name'    => 'required',
             'title'    => 'required',
             'titleDetails'    => 'required',
             'contentBody'    => 'required',
         ]);

         $content=new Section();
         $content->name=$request->name;
         $content->title=$request->title;
         $content->titleDetails=$request->titleDetails;
         $content->contentBody=$request->contentBody;

         $content->image=$image;


         $Result= $content->save();

         if($Result==1)
         {
             Alert::success('تم الحفظ بنجاح', 'Success Message');

         }
         else
         {
             Alert::error('هناك خطأ', 'Error Message');

         }
             return redirect('/dashboard/contents/');

     }

    public function edit($id)
    {
        $content = ContentModel::find($id);


        if (isset($content) && $content != null){
            return view('faculty.editContent',['content'=>$content]);
        }else{
            return redirect(route('adminhome'));
        }

    }
    public function  updated(Request $request)
    {
        $id = $request->id;
        $content = ContentModel::find($id);
        if (isset($content) && $content != null)
        {
            return view('faculty.editContent',['content'=>$content]);
        }else{
            return redirect(route('adminhome'));
        }

        $this->validate($request,[
            'name'    => 'required',
            'details'    => 'required',
        ]);
        if($request->has('image')):
            if ( $content->image != null ){
                unlink('assets/images/content'.'/'.  $content->image);
            }
            $image= $this->saveImage($request->file('image'),'sections');
        else:
            $image = '';
        endif;

        if($image!='')
        {
            $content->image=$image;

        }


        $content->name = $request->name;
        $content->details = $request->details;


        $Result= $content->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }

        return redirect('/dashboard/contents');
    }

    public function deleteContent($id)
    {
        $content = ContentModel::where('id', $id)->delete();
        if (isset($content) && $content != null)
        {
            return view('faculty.editContent',['content'=>$content]);
        }else{
            return redirect(route('adminhome'));
        }

        if ( $content->image != null )
        {
            unlink('assets/images/content'.'/'.  $content->image);
        }
        $content->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/contents');
    }
}
