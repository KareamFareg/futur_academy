<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Stats;
use App\Traits\saveImage;
use Illuminate\Http\Request;
use App\Models\serviceModel;
Use Alert;
use DB;

class StatsController extends Controller
{
       use saveImage;
       public function add()
       {
           return view('admin.stats.add');
       } 
       public function edit($id)
       {
           $stats = Stats::find($id);
           if($stats == null){
               return redirect('/dashboard/adminhome');
           }
           return view('admin.stats.edit',compact('stats'));
       }
   
   ########
       public function  insert(Request $request)
       {


           $this->validate($request,[
               'title'    => 'required',
               'details' => 'required|numeric ',
           ]);

           $stats=new Stats();
           $stats->title = $request->title;
           $stats->details = $request->details;
           $stats->sign = $request->sign;


           $Result= $stats->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }
           return redirect('/dashboard/stats/view');
           
       }    
       public function  update(Request $request)
       {

           $id = $request->id;
           $stats= Stats::find($id);

           $this->validate($request,[
               'title'    => 'required',
               'details' => 'required|numeric',
           ]);

           $stats->title = $request->title;
           $stats->details = $request->details;
           $stats->sign = $request->sign;

           $Result= $stats->save();

           if($Result==1)
           {
               Alert::success('تم الحفظ بنجاح', 'Success Message');

           }
           else
           {
               Alert::error('هناك خطأ', 'Error Message');

           }

           return redirect('/dashboard/stats/view');


           
       }
   
   
   
 
       public function view ()
       {
          //return view('admin.content.view');

           $statics =DB::table('stats')->orderBy('id','DESC')->paginate(10);

           return view('admin.stats.view', compact('statics'));
       }
   
       
       public function delete($id)
       {
        $stats= Stats::find($id);
           if($stats == null){
               return redirect('/dashboard/stats/view');
           }

           $stats->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/stats/view');
       }
       
      
      
   }
