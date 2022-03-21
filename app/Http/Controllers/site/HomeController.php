<?php

namespace App\Http\Controllers\site;


use App\Http\Controllers\Admin\Content;
use App\Http\Controllers\Controller;
use App\Models\ContentModel;
use App\Models\Ourteam;
use App\Models\Partners;
use App\Models\Portfolio;
use App\Models\Section;
use App\Models\Service;
use App\Models\Stats;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\contactusModel;
use App\Models\Category;
use App\Models\Review;
use App\Models\Event;




use Alert;



class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::tree()->get()->toTree();
        $services = Service::orderBy('id','DESC')->paginate(4);
        $whoUs = ContentModel::find(1);
        $sections = Section::orderBy('id','DESC')->get();
        $ourTeam = Ourteam::orderBy('id','DESC')->get();
        $portfolio = Portfolio::orderBy('id','DESC')->paginate(5);
        $partners = Partners::orderBy('id','DESC')->get();
        $events = Event::orderBy('id','DESC')->paginate(3);
        $statics = Stats::orderBy('id','DESC')->paginate(4);

        return view('site.sitehome', compact('categories','services','whoUs','sections','ourTeam','portfolio','partners','events','statics'));
    }
}
