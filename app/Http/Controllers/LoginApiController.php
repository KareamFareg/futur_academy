<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginApiController extends Controller
{
    //
    public function register(Request $request)
    {

        $user_reg=new User();
        $user_reg->name=$request->name;
        $user_reg->email=$request->email;
        $user_reg->password= Hash::make($request->password);
        $loginData=User::where('email', $user_reg->email)->first();
        if(!$loginData){
            $user_reg->save();//($request->all);
            $user_reg->mesg='1';
            return response()->json($user_reg, 200);
        }
        else{
            return response()->json(['mesg' => 'البريد الإلكتروني مسجل من قبل'], 404);

        }
               
    }
    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $loginData=User::where('email', $email)->first();
        if($loginData && Hash::check($request->password,$loginData->password))
        {
            return $loginData;
        }
        else
        {
            $mesg='faild';
            return response()->json(['loginData' => 'البريد الإلكتروني او كلمة المرور خطا'], 404);

        }
    }
    public function getuserbyID($id)
    {
        $loginData=User::where('id', $id)->first();
        if($loginData)
        {       
             return $loginData;
        }
        else
        {
            return response()->json(['mesg' => 'لاتوجد بيانات'], 404);

        }
    }
    public function updateProfile(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $officename=$request->officename;
        $officephone=$request->officephone;
        $phone=$request->phone;
        $city=$request->city;
        $days=$request->days;
        $area=$request->area;
        $cats=$request->cat;
        $catsarr=explode(",",$cats);
        DB::update('update users set  name=?,officename=?, officephone=?,phone=?,city=?, days=?, area=? where id=?', [$name,$officename,$officephone,$phone,$city,$days,$area,$id]);
        $result = DB::delete("delete from user_service where user_id='$id'");
        foreach($catsarr as $cat)
        {
            DB::insert("insert into user_service(id,serv_id,user_id) Values(NULL,?,?)",[$cat,$id]);
        }
        return response()->json(['loginData' => 'تم الحفظ بنجاح'], 200);

    }
    public function getallservicesapi()
    {
        $services=DB::select("select * from services");
        if(count($services)>=1){
        return $services;
        }
        else
        {
            return response()->json(['mesg' => 'لاتوجد بيانات'], 404);

        }
    }

}
