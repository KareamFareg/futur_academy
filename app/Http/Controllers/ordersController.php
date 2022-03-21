<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Models\orders;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;



class ordersController extends Controller
{
    public function orders()
    {
        $id = Auth::user()->id;
        $orders = DB::select("SELECT *,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where `user_id`='$id'");
        return view('site.orders', compact('orders'));
    }
    public function orderdetails($id)
    {
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where accept='1' and `id`='$id'        ");
       if(count($orders)>0)
       {     
              return view('site.orderdetails', compact('orders'));
       }
       else
       {
        toast('   العقار غير موجود  ', 'error');
        return redirect('/');


       }
    }
    public function our_building()
    {
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where accept='1' order by id desc ");
        return view('site.our_building', compact('orders'));
    }
    public function ourbuilding($loc)
    {
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where accept='1' and location like '$loc' order by id desc ");
        return view('site.our_building', compact('orders'));
    }
    public function searchword(Request $request)
    {
        $pattern = $request->txt;
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where MATCH (`name`,`details`) AGAINST ('$pattern' IN NATURAL LANGUAGE MODE) and accept='1' order by id desc ");
        return view('site.our_building', compact('orders'));
    }
    public function addorders()
    {
        $type = DB::select('select * from ordertype');
        // print_r($type);
        return view('site.addorders', compact('type'));
    }
    public function editadv($id)
    {
        $type = DB::select('select * from ordertype');
        $uid = Auth::user()->id;
        if (Auth::user()->isadmin != '1') {
            $order = DB::select("select * from  orders where id='$id' and user_id='$uid'");
            return view('site.editadv', compact('order', 'type'));

        } else {
            $order = DB::select("select * from  orders where id='$id'");
            return view('admin.editadminorder', compact('order','type'));

        }
    }
    
    public function addadminorder()
    {
        $type = DB::select('select * from ordertype');
        // print_r($type);
        return view('admin.addadminorder', compact('type'));
    }
    public function showcustomerorders()
    {
        $orders = DB::select("SELECT *,(SELECT services.name from services where services.id=orders.serv_id)as'type_name' FROM `orders`  order by id desc");

        return view('admin.custorders', compact('orders'));
    }
    public function adminorders()
    {
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders`  order by id desc");

        return view('admin.orders', compact('orders'));
    }
    public function acceptorders($accept, $id)
    {
        if (Auth::user()->isadmin == 1) {
            DB::update("update orders set accept='$accept' where id=$id");
            if ($accept == 1) {
                toast('تم  التفعيل بنجاح  ', 'success');
            } else {
                toast('تم إلغاء التفعيل بنجاح  ', 'success');
            }
        }
        return redirect('/dashboard/allorders');
    }
    public function deleadv($id)
    {
        if (Auth::user()->isadmin == 1) {
            DB::delete("delete from orders where id=$id");

            toast('تم الحذف  بنجاح  ', 'success');
            return redirect('/dashboard/allorders');
        } else {
            $uid = Auth::user()->id;
            DB::delete("delete from orders where id=$id and user_id='$uid';");

            toast('تم الحذف  بنجاح  ', 'success');
            return redirect('/myorders');
        }
    }
    public function makeadvOffered($id,$isoffered)
    {
        if (Auth::user()->isadmin == 1) {
            DB::update('update orders set isoffered = ? where id = ?', [$isoffered,$id]);

            toast('تم الحفظ  بنجاح  ', 'success');
            return redirect('/dashboard/allorders');
        } else {
            $uid = Auth::user()->id;
            DB::update('update orders set isoffered = ? where id = ?', [$isoffered,$id]);

            toast('تم الحذف  بنجاح  ', 'success');
            return redirect('/myorders');
        }
    }

    public function adminordersByuser($id)
    {
        $orders = DB::select("SELECT *,(SELECT users.img from users where users.id=orders.user_id) as'office_img',(SELECT users.officename from users where users.id=orders.user_id) as'office_name' ,(SELECT ordertype.name from ordertype where ordertype.id=orders.type)as'type_name' FROM `orders` where orders.user_id=$id ORDER by `id` DESC");

        return view('admin.orders', compact('orders'));
    }
    function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}
    public function addorder(Request $request)
    {
        $user_id = Auth::user()->id;
      /*  $r= Validator::make($request->all(), [
            'price' => array('required', 'regex:/^\d+(\.\d{1,2})?$/'),
            'rooms' => ['required', 'int'],
            'bathroom' => ['required', 'int'],
            'parking' => ['required', 'int'],
            'numfloor' => ['required', 'int'],
            'area' => array('required', 'regex:/^\d+(\.\d{1,2})?$/'),
            
        ]);
        if($r->fails())
        {
            toast(' تاكد من ادخال البيانات بطريقه صحيحه  ', 'success');
            return $r;

        }
        else
        {*/
           
        $type = $request->type;
        $name = $request->name;
        $rooms = $request->rooms;
        $bathroom = $request->bathroom;
        $parking = $request->parking;
        $numfloor = $request->numfloor;
        $area = $request->area;
        $forrent = $request->forrent;
        $price = $request->price;
        $location = $request->location;
        $details = $request->details;
        if(Auth::user()->isadmin=='1')
        $accept='1';
        else
        $accept=0;
        $arr = array();
        if ($request->hasFile('files')) :
            $images = $request->file('files');
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $rand = mt_rand(1000000, 9999999);
                $imageName = $time . $rand . '.' . $item->getClientOriginalExtension();
                $item->move(public_path('images'), $imageName);
                $arrfile = '/images/' . $imageName;
                array_push($arr, $arrfile);
            endforeach;
        else :
            $image = NULL;
        endif;
         if ($request->hasFile('banner')) :
            $banner = $request->file('banner');
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $rand = mt_rand(1000000, 9999999);
                $imageName = $time . $rand . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('images'), $imageName);
                $banner = '/images/' . $imageName;
        else :
            $banner = NULL;
        endif;
        DB::insert('insert into orders   (`id`, `name`, `user_id`, `type`, `rooms`, `bathroom`, `parking`, `numfloor`, `area`, `img`, `forrent`, `price`, `location`, `details`, `accept`, `banner`) values(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$name, $user_id, $type, $rooms, $bathroom, $parking, $numfloor, $area, json_encode($arr), $forrent, $price, $location, $details,$accept,$banner]);

        // Alert::success('تم الحفظ بنجاح', 'Success Message');


        // Alert::error('هناك خطأ', 'Error Message');
        if (Auth::user()->isadmin == 0) {
            toast('تم اضافه الاعلان  فى انتظار موافقه مدير الموقع', 'success');
            return redirect('/');
        } else {
            toast('تم اضافه الاعلان ', 'success');

            return redirect('/dashboard/allorders');
        }
   // }
    }
    public function  updateorder(Request $request)
    {
        $arr = array();
        $image = NULL;
        if ($request->hasFile('files')) :
            $images = $request->file('files');
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $rand = mt_rand(1000000, 9999999);
                $imageName = $time . $rand . '.' . $item->getClientOriginalExtension();
                $item->move(public_path('images'), $imageName);
                $arrfile = '/images/' . $imageName;
                array_push($arr, $arrfile);
                $image = 'i';
            endforeach;
        else :
            $image = NULL;
        endif;
        $banner = NULL;
        if ($request->hasFile('banner')) :
            $banner = $request->file('banner');
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $rand = mt_rand(1000000, 9999999);
                $imageName = $time . $rand . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('images'), $imageName);
                $banner = '/images/' . $imageName;
        else :
            $banner = NULL;
        endif;


        $Content = new orders();
        $Content->exists = true;
        $Content->id = $request->id;
        $Content->name = $request->name;
        $Content->type = $request->type;
        $Content->rooms = $request->rooms;
        $Content->bathroom = $request->bathroom;
        $Content->parking = $request->parking;
        $Content->numfloor = $request->numfloor;
        if (Auth::user()->isadmin != 1)
            $Content->accept = 0;
        if ($image != NULL) {
            $Content->img = json_encode($arr);
        }if ($banner != NULL) {
            $Content->banner = $banner;
        }
        $Content->area = $request->area;
        $Content->forrent = $request->forrent;
        $Content->price = $request->price;
        $Content->location = $request->location;
        $Content->details = $request->details;
        $Result = $Content->save();

        if ($Result == 1) {
            toast('تم الحفظ بنجاح ', 'Success Message');
        } else {
            toast('هناك خطأ', 'Error Message');
        }


        // Alert::error('هناك خطأ', 'Error Message');
        if (Auth::user()->isadmin == 0) {
            return redirect('/myorders');
        } else {
            return redirect('/dashboard/allorders');
        }
    }
    public function makecustorder(Request $request)
    {
        $type = $request->type;
        $area = $request->area;
        $price = $request->price;
        $location = $request->location;
        $cont = $request->cont;
        $email = $request->email;
        $phone = $request->phone;
        $type_name = DB::select("select *  FROM `ordertype` where  `id`='$type'");
        $singleTypename = $type_name[0]->name;
        DB::insert("INSERT INTO `customerorders` (`id`, `type`, `area`, `price`, `location`, `email`, `phone`, `cont`) VALUES (NULL, '$type', '$area', '$price', '$location', '$email', '$phone', '$cont');");
        $subject = "مطلوب " . $singleTypename . ' بسعر ' . $price . ' بمساحة ' . $area;
        $this->sendMail($email, $cont, $subject);
        return redirect('/');
    }
    static function sendMail($email, $cont, $subject)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions


        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.zoho.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@rowadplus.com';   //  sender username
            $mail->Password = 'Rowad@plus@2';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@rowadplus.com', 'doaa');
            $mail->addAddress($email);


            //  $mail->addReplyTo('doaamohmed21@gmail.com', 'sen');

            /* if(isset($_FILES['emailAttachments'])) {
               for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                   $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
               }
           }*/


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $cont;

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                //return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                Alert::error("failed", "Email not sent.");
            } else {
                Alert::success('تم الحفظ بنجاح', 'Success Message');
            }
        } catch (Exception $e) {
            Alert::error('Message could not be sent.', 'error');
        }
    }
    /*************************************API */
    public function apiordersByuserid($id)
    {
        $orders = DB::select("SELECT *,(SELECT services.Title FROM services where services.id=orders.order_type) as 'serv_name',(SELECT users.name from users WHERE users.id=orders.user_id) as 'Duser_name' FROM `orders` where orders.user_id=$id ORDER by `id` DESC");
        if (count($orders) >= 1) {
            return $orders;
        } else {
            return response()->json(['mesg' => 'لاتوجد بيانات'], 404);
        }
    }
    public function apiordersBytype($id)
    {
        $orders = DB::select("SELECT *,(SELECT services.Title FROM services where services.id=orders.order_type) as 'serv_name',(SELECT users.name from users WHERE users.id=orders.user_id) as 'Duser_name' FROM `orders` where orders.order_type=$id ORDER by `id` DESC");
        if (count($orders) >= 1) {
            return $orders;
        } else {
            return response()->json(['mesg' => 'لاتوجد بيانات'], 404);
        }
    }
    public function apiaddorder(Request $request)
    {
        $orders = new orders();
        $orders->user_name = $request->user_name;
        $orders->user_id = $request->user_id;
        $orders->order_type = $request->order_type;
        $orders->title = $request->title;
        $orders->phone = $request->phone;
        $orders->cont = $request->cont;
        $arr = [];
        if ($request->hasFile('files')) :
            $images = $request->file('files');
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $rand = mt_rand(1000000, 9999999);
                $imageName = $time . $rand . '.' . $item->getClientOriginalExtension();

                $item->move(public_path('images'), $imageName);
                $arr[] = $imageName;
            endforeach;
            $orders->files = json_encode($arr);
        else :
            $orders->files = '';
        endif;
        $orders->save(); //($request->all);
        return response()->json($orders, 200);
        //DB::insert('insert into orders  (id,title,user_name,order_type,cont,user_id,files,phone) values(NULL,?,?,?,?,?,?,?)', [$title,$user_name,$order_type,$cont,$user_id,$image,$phone]);

    }
}
