<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FeasibilitystudyModel;
use RealRashid\SweetAlert\Facades\Alert;



class feasibilitystudycontroller extends Controller
{
    //
    public function view($id)
    {
        if($id==0)
        {
            $where="sector_id >0";
        }
        else if($id==-2)
        {
            $where="sector_id = '$id'";;

        }
        else{
            $where="sector_id = '$id'";;

        }

        $orders = DB::select("SELECT *,(select sectors.name FROM sectors WHERE sectors.id=sector_id)as 'sector_name' FROM `feasibilitystudy` where $where order by id DESC");
        $Cats = DB::table('sectors')->select('id','name')->get();

        return view('admin.feasibilitystudy.view', compact('orders','id','Cats'));
    }
    public function addFS($id)
    {
        $Cats = DB::table('sectors')->select('id','name')->get();

        return view('admin.feasibilitystudy.add', compact('Cats','id'));
    }
    public function editFS($id)
    {
        $Cats = DB::table('sectors')->select('id','name')->get();
        $content = DB::table('feasibilitystudy')->where('id',$id)->get();
        return view('admin.feasibilitystudy.edit',compact('Cats','content'));
    }
    public function deleteFS($id)
    {
        DB::table('feasibilitystudy')->where('id', $id)->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/feasibilitystudy/view/0');
    }
    public function insertFS(Request $request)
    {
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $images->getClientOriginalExtension();
                    
                    $images->move(public_path('images'), $imageName);
                    $arr = $imageName;
                $image = '/images/'.($arr);

        else:
                $image = '';
        endif;
        $FS=new FeasibilitystudyModel();
        $FS->title=$request->Title;
        $FS->sector_id=$request->sector_id;
        $FS->details=$request->details;
        $FS->projectdetails=$request->projectdetails;
        $FS->productstudies=$request->productstudies;
        $FS->projectdesc=$request->projectdesc;
        $FS->financial=$request->financial;
        $FS->studycontent=$request->studycontent;
        $FS->country=$request->country;
        $FS->img=$image;
        $Result= $FS->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        return redirect('/dashboard/feasibilitystudy/view/0');

    }
    public function updateFS(Request $request)
    {
        if ($request->hasFile('files')) :
            $images = $request->file('files');
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $rand=mt_rand(1000000, 9999999);
                    $imageName = $time .$rand. '.' . $images->getClientOriginalExtension();
                    
                    $images->move(public_path('images'), $imageName);
                    $arr = $imageName;
                $image = '/images/'.($arr);

        else:
                $image = '';
        endif;
        $FS=new FeasibilitystudyModel();
        $FS->exists = true;
        $FS->id=$request->id;
        $FS->title=$request->Title;
        $FS->sector_id=$request->sector_id;
        $FS->details=$request->details;
        $FS->projectdetails=$request->projectdetails;
        $FS->productstudies=$request->productstudies;
        $FS->projectdesc=$request->projectdesc;
        $FS->financial=$request->financial;
        $FS->studycontent=$request->studycontent;
        $FS->country=$request->country;
        if($image!='')
        {
            $FS->img=$image;

        }
        $Result= $FS->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        return redirect('/dashboard/feasibilitystudy/view/'.$request->sector_id);

    }
    public function filterFS(Request $request)
    {
        $id=$request->sector_id;
        return redirect('/dashboard/feasibilitystudy/view/'.$id);

    }
}
