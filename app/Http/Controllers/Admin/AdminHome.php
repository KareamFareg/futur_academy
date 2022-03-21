<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Traits\saveImage;
use Illuminate\Http\Request;
use DB;
use App\Models\settings;
use Hash;
use Alert;
use Illuminate\Support\Facades\Auth;

class AdminHome extends Controller
{
    use saveImage;
    
    public function index()
    {
        if (Auth::check()) {

//        $stat=DB::select("SELECT (select count(*) from feasibilitystudy where sector_id >0 )as'FS',(select count(*) from feasibilitystudy where sector_id ='-3' )as'investus', (select count(*) from feasibilitystudy where sector_id ='-2' )as'productline',(SELECT COUNT(*) from orders) as 'customerorders',(SELECT count(*) from services) as 'services'");
//        $users=DB::select("SELECT *,(SELECT COUNT(*) from orders where orders.serv_id=services.id) as'countorder' FROM services order by id desc");
       $services = Service::all();
        return view('admin.home',compact('services'));
        }
        else
        {
            return redirect('/dashboard/login');

        }

    }
    public function showcontact()
    {
        $settings = DB::select("SELECT * from contactus order by id DESC");
        return view('admin.showcontact', compact('settings'));
    }

    public function updateprofile()
    {
        $profile = User::find(Auth::user()->id);
        return view('admin.profile', compact('profile'));
    }
    public function changepassword(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'fullName' => 'required',
            'phone' =>'numeric',
            'password'=>'required'
        ]);
        $profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->fullName = $request->fullName;
        $profile->phone = $request->phone;
        $profile->city = $request->city;
        $profile->area = $request->area;
        if($request->has('img')){
            if ( $profile->img != null && $profile->img != strtoupper(substr($profile->name,0,1)).'.png'
                && strlen($profile->img) != 5 ){
                unlink('assets/images/letters'.'/'.  $profile->img);
            }
            $profile->img = $this->saveImage($request->file('img'),'letters');
        }

        // PASSWORD CHECK IF USER INSERT NEW PASSWORD OR IT'S OLD
//        if($request->password != $profile->password ||  \Illuminate\Support\Facades\Hash::check($profile->password,$request->password) != true)
//        {
//            $profile->password=Hash::make($request->password);
//        }
        $profile->password=Hash::make($request->password);
        if($request->email !== $profile->email )
        {
            $this->validate($request,[
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);

            $profile->email=$request->email;
        }
        $Result= $profile->save();


        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        return redirect('/dashboard/home');

    }


    public function editCompanyProfile(){
        $settings = DB::select("SELECT * from setting where id='1'");
        if($settings == null){
            return redirect('dashboard/home');
        }
        return view('admin.CompanyProfile', compact('settings'));
    }
    public function updateCompanyProfile(Request $request){
        $setting=new settings();
        if($request->has('image')):
            if ( $setting->image != null ){
                unlink('assets/images/settings'.'/'.  $setting->image);
            }
            $image= $this->saveImage($request->file('image'),'settings');
        else:
            $image = '';
        endif;

        if($image!='')
        {
            $setting->image=$image;

        }
        if($request->has('logo')):
            if ( $setting->logo != null ){
                unlink('assets/images/settings'.'/'.  $setting->logo);
            }
            $logo= $this->saveImage($request->file('logo'),'settings');
        else:
            $logo = '';
        endif;

        if($logo!='')
        {
            $setting->logo=$logo;

        }
        $setting->exists = true;
        $setting->id=1;
        $setting->phone=$request->phone;
        $setting->whatsapp=$request->whatsapp;
        $setting->email=$request->email;
        $setting->fb=$request->fb;
        $setting->tw=$request->tw;
        $setting->address=$request->address;
        $setting->linkedin=$request->linkedin;

        $Result= $setting->save();
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        if($Result==1)
        {
            Alert::success('تم الحفظ بنجاح', 'Success Message');

        }
        else
        {
            Alert::error('هناك خطأ', 'Error Message');

        }
        return redirect('/');

    }
}
