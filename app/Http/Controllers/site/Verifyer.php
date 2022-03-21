<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use Alert;


class Verifyer extends Controller
{
    //
    public function index()
        {
            $Documented = DB::table('users') ->where('isadmin', '=', 0)->where('active', '=', 1)->where('type', '=', 0)->get();
         //   $Count = $Documented->count();
            
            return view('site.verifyer', compact('Documented'));
           
        }
        public function result(Request $request)
        {
            $city=$request->city;
            $serv_id=$request->serv_id;
            $Documented = DB::select('SELECT * FROM `users` where isadmin=0 and active=1  and type=0 and ? in (SELECT user_service.serv_id from user_service where user_service.user_id=users.id)',[$serv_id]);
               return view('site.verifyer', compact('Documented'));
        }
        public function adminallusers()
        {
            $users=DB::select("SELECT * FROM users where isadmin='1' ");
            return view('admin.verifyer', compact('users'));

        } 
        public function adminactiveusers()
        {
            $users=DB::select("SELECT * FROM users where isadmin<>1 and active='1'");
            return view('admin.verifyer', compact('users'));

        }      
         public function adminnotactiveusers()
        {
            $users=DB::select("SELECT * FROM users where isadmin<>1 and active='0'");
            return view('admin.verifyer', compact('users'));

        }
        public function activiate($id,$user_id)
        {
            DB::delete("delete from users  where id=$user_id");
            toast('تم  الحذف بنجاح  ','success');
         
           
            return redirect('/dashboard/allusers');

        }
        public function insertusers(Request $request)
        {
            
            $user_reg=new User();
            $user_reg->name=$request->name;
            $user_reg->email=$request->email;
            $user_reg->isadmin='1';
            $user_reg->password= Hash::make($request->password);
            $loginData=User::where('email', $user_reg->email)->first();
            if(!$loginData){
                $user_reg->save();//($request->all);
                $user_reg->mesg='1';
                Alert::success('تم الحفظ بنجاح', 'Success Message');            }
            else{
                Alert::error(' البريد الإلكتروني مسجل من قبل', 'Error Message');

    
            }
            return redirect('/dashboard/allusers');

        }
          /*************************************API */
    public function documenteduser()
    {
        $users=DB::select("SELECT `id`,`name`,`email`,`phone`,`officename`,`city`,`area`,`days`,(SELECT COUNT(*) from orders where orders.user_id=users.id) as'countorder' FROM users where isadmin<>1 and active='1' and type=0 ");
        return $users;
    }
    public function documenteduserbytype($id)
    {
        $users=DB::select("SELECT `id`,`name`,`email`,`phone`,`officename`,`city`,`area`,`days`,(SELECT COUNT(*) from orders where orders.user_id=users.id) as'countorder' FROM users where isadmin<>1 and active='1' and type=0  and ? in (SELECT user_service.serv_id from user_service where user_service.user_id=users.id)",[$id]);
        return $users;
    }
}
