<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Traits\saveImage;
use App\Models\Faculty;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;



class PortfolioController extends Controller
{
    use saveImage;
     public function index()
     {
         $portfolios = Portfolio::orderBy('id','DESC')->get();
         $id=0;
         return view('admin.portfolio.View',compact('portfolios','id'));
     }
     public function add()
     {
         return view('admin.portfolio.add');
     }
     public function addPortfolio(Request $request)
     {

        if($request->has('image')):
              $image= $this->saveImage($request->file('image'),'portfolio');
         else:
             $image = '';
         endif;
         if($request->has('images')) {
             $images = '';
             foreach ($request->images as $key => $ManyImage){
                 $images = $images . ',' . $this->saveImage($ManyImage,'portfolio',$key);
             }

         }else{
             $images = '';
         }
         $this->validate($request,[
             'title'    => 'required',
             'details'    => 'required',
             'image'    => 'required',
             'images'    => 'required',
         ]);

         $portfolio=new Portfolio();
         $portfolio->title=$request->title;
         $portfolio->details=$request->details;
         $portfolio->image=$image;
         $portfolio->images= $images;

         $Result= $portfolio->save();

         if($Result==1)
         {
             Alert::success('تم الحفظ بنجاح', 'Success Message');

         }
         else
         {
             Alert::error('هناك خطأ', 'Error Message');

         }
             return redirect('/dashboard/portfolio');

     }

    public function edit($id)
    {
        $portfolio = Portfolio::find($id);


        if (isset($portfolio) && $portfolio != null){
            return view('admin.portfolio.edit',['portfolio'=>$portfolio]);
        }else{
            return redirect('/dashboard/portfolio');
        }

    }
    public function  updated(Request $request)
    {
        $id = $request->id;

        $portfolio = Portfolio::find($id);
        if($portfolio == null){
            return redirect('/dashboard/adminhome');
        }
        $this->validate($request,[
            'title'    => 'required',
            'details'    => 'required',
        ]);


        /**
         * delete product old image and save new product image
         */
        if($request->has('newimage'))
        {
            if ( $portfolio->image != null )
            {
                unlink('assets/images/portfolio'.'/'.  $portfolio->image);
            }
            $portfolio->image= $this->saveImage($request->file('newimage'),'portfolio');

        }



            /**
             * delete old product Gallery and save new product Gallery
             */

        if($request->has('newimages'))
        {

            if ($portfolio->images != null)
            {
                $images = explode(",", $portfolio->images);
                foreach ($images as $key =>$Manyimage) {
                    if ($key != 0 )
                    {
                        if ($Manyimage)
                        {
                            unlink('assets/images/portfolio' . '/' . $Manyimage);
                        }
                    }
                }
            }
            /**
             * store new Product Gallery
             */
            $imagesname = '';
            foreach ($request->newimages as $key => $newManyimage) {
                if ($newManyimage)
                {
                    $imagesname = $imagesname . ',' . $this->saveImage($newManyimage, 'portfolio', $key);;
                }
            }
            $portfolio->images = $imagesname;

        }
        $portfolio->title = $request->title;
        $portfolio->details = $request->details;


        $Result= $portfolio->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }

        return redirect('/dashboard/portfolio');
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        if($portfolio == null){
            return redirect('/dashboard/adminhome');
        }
        if ( $portfolio->image != null )
        {
            unlink('assets/images/portfolio'.'/'.  $portfolio->image);
        }
        if(!empty($portfolio->images))
        {
            $images = explode(",", $portfolio->images);
            foreach ($images as $key=>$Manyimage)
            {
                if ($key != 0)
                {
                    if ($Manyimage)
                    {
                        unlink('assets/images/portfolio' . '/' . $Manyimage);
                    }
                }
            }
        }
        $portfolio->delete();
        Alert::success('تم الحذف بنجاح', 'Success Message');
        return redirect('/dashboard/portfolio');
    }
}
