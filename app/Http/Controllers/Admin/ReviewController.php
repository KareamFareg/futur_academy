<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ContentModel;
Use Alert;

class ReviewController extends Controller
{
    //

    public function viewAll ()
    {
       //return view('admin.content.view');

        $Reviews =DB::table('reviews')->orderBy('id','DESC')->get();

        $id=0;
        return view('admin.content.view', compact('Reviews','id'));
    }



    
    public function deleteReview($id)
    {
        $review = Review::find($id);
        if($review == null){
            return redirect('/dashboard/adminhome');
        }
     $review->delete();
     Alert::success('تم الحذف بنجاح', 'Success Message');
     return redirect('/dashboard/reviews');
    }


}
