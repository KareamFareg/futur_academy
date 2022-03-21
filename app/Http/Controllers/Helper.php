<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class Helper extends Controller
{
    //


    static function GetSelectItem($tbl, $id, $title)
    {

        $Cats = DB::table($tbl)->select($id, $title)->get();
        foreach ($Cats as $SingleCart) {
            echo "<option value='$SingleCart->id'>$SingleCart->name</option>";
        }
    }
    static function getserviceBytype($type)
    {

        $Cats = DB::select('select * from services where type = ?', [$type]);
        return $Cats;
    }
    static function getsectors()
    {

        $Cats = DB::select('select * from sectors');
        return $Cats;
    }
    static function getLocation()
    {
        $location = DB::select("SELECT `location` FROM `orders` GROUP BY location");
        return $location;
    }
    static function Notifications()
    {
        $id = Auth::user()->id;
        $notify = DB::select("SELECT * FROM `orders`   where `user_id`='$id' and `accept`='1' ORDER BY `orders`.`id` DESC LIMIT 0,5");
        return $notify;
    }
    static function GetContentBYID($id)
    {

        $Cats = DB::table("content")->where('id', $id)->get();
        return $Cats;
    }
    static function Getsettings()
    {
        $services = DB::table("setting")->where('id', '1')->get();
        return $services;
    }
    static function GetcontBYCatID($id, $limit)
    {
        if ($limit == 0) {
            $Cats = DB::table("content")->where('Category', $id)->get();
        } else {
            $Cats = DB::table("content")->limit($limit)->where('Category', $id)->get();
        }
        return $Cats;
    }
    static function GetordersByuser_id($user_id)
    {
        if ($user_id == 0) {
            $Cats = DB::table("orders")->get();
        } else {
            $Cats = DB::table("orders")->where('user_id', $user_id)->get();
        }
        return $Cats;
    }
    static function GetordersBycust_id($user_id)
    {
        $Cats = DB::table("orders")->where('customer_id', $user_id)->get();


        return $Cats;
    }
    static function GetservicesForUser($user_id)
    {
        $Cats = DB::select("select *,(select Title from services where services.id=user_service.serv_id)as'serv_name' from user_service where user_id=?", [$user_id]);
        return $Cats;
    }
}
