<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ContentModel;
Use Alert;

class Content extends Controller
{
    //
    public function addcontent()
    
    {
        
        $EN=env('EN_ENABLED');
        $id=0;
        $countries = DB::table('countries')->select('id','Title')->get();
        $Cats = DB::table('category')->select('id','Title')->whereNotIn('id',[10,11,14,15,16,17,18,19])->get();
        return view('admin.content.add',compact('Cats','EN','id','countries'));
    }  
       public function addcontentcatid($id)
    
    {
        
        $EN=env('EN_ENABLED');
        $Cats = DB::table('category')->select('id','Title')->where('id',$id)->get();
        $countries = DB::table('countries')->select('id','Title')->get();
        return view('admin.content.add',compact('Cats','EN','id','countries'));
    } 
    public function editcontent($id)
    
    {
        
        $EN=env('EN_ENABLED');
        $Cats = DB::table('category')->select('id','Title')->get();
        $content = DB::table('content')->where('id',$id)->get();
        $countries = DB::table('countries')->select('id','Title')->get();

        return view('admin.content.edit',compact('Cats','EN','content','countries'));
    }

########
    public function  insertcontent(Request $request)
    {
  


    
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $item->getClientOriginalExtension();
                    
                    $item->move(public_path('images'), $imageName);
                    $arr[] = '/images/'.$imageName;
                endforeach;
                $image = json_encode($arr);
        else:
                $image = '';
        endif;
        $cat_id=$request->Category;
        $Content=new ContentModel();
        $Content->TitleAr=$request->TitleAr;
        $Content->TitleEn=$request->TitleEn;
        $Content->ContentDate=$request->ContentDate;
        $Content->Category=$request->Category;
        $Content->Status=$request->Status;
        $Content->ContentAr=$request->ContentAr;
        $Content->ContentEn=$request->ContentEn;
        $Content->Image=$image;
        if($cat_id==14)
        {
            $Content->country_id=$request->countries;
        }
        else
        {
            $Content->country_id=0;
        }
        $Content->SlugAr=Str::slug($request->TitleAr);
        $Content->SlugEn=Str::slug($request->TitleEn);

        $Result= $Content->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        $os = array(10,11,14,15,16,17,18,19);

        if(in_array($cat_id, $os) ){
            return redirect('/dashboard/content/view/'.$cat_id);

        }
        else{
            return redirect('/dashboard/content/view');
        }
        
    }    
    public function  updatecontent(Request $request)
    {
        $cat_id=$request->Category;
    
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $item->getClientOriginalExtension();
                    
                    $item->move(public_path('images'), $imageName);
                    $arr[] = '/images/'.$imageName;
                endforeach;
                $image = json_encode($arr);
        else:
                $image = '';
        endif;


        $Content=new ContentModel();
        $Content->exists = true;
        $Content->id=$request->id;
        $Content->TitleAr=$request->TitleAr;
        $Content->TitleEn=$request->TitleEn;
        $Content->ContentDate=$request->ContentDate;
        $Content->Category=$request->Category;
        $Content->Status=$request->Status;
        $Content->ContentAr=$request->ContentAr;
        $Content->ContentEn=$request->ContentEn;
        if($image!='')
        {
            $Content->Image=$image;

        }
        $Content->SlugAr=Str::slug($request->TitleAr);
        $Content->SlugEn=Str::slug($request->TitleEn);
        if($cat_id==14)
        {
            $Content->country_id=$request->countries;
        }
        else
        {
            $Content->country_id=0;
        }
        $Result= $Content->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        $os = array(10,11,14,15,16,17,18,19);

        if(in_array($cat_id, $os) ){
            return redirect('/dashboard/content/view/'.$cat_id);

        }
        else{
            return redirect('/dashboard/content/view');
        }        
    }



    ##########
    public function view ()
    {
       //return view('admin.content.view');

        $Content =DB::table('content')->whereNotIn('Category',[10,11,14,15,16,17,18,19])->get();
        $id=0;
        return view('admin.content.view', compact('Content','id'));
    }
    public function viewAll ()
    {
       //return view('admin.content.view');

        $Content =DB::table('reviews')->orderBy('id','DESC')->get();
        $id=0;
        return view('admin.content.view', compact('Content','id'));
    }

      public function viewcontbycat ($id)
    {
       //return view('admin.content.view');

        $Content = DB::table('content')->where('Category',$id)->get();

        return view('admin.content.view', compact('Content','id'));
    }

    
    public function deletecontent($id)
    {
     DB::table('reviews')->where('id', $id)->delete();
     Alert::success('تم الحذف بنجاح', 'Success Message');
     return redirect('/dashboard/reviews');
    }


}
