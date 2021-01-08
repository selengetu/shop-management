<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\User;
use Hash;

class ConstInfoController extends Controller {

    public function index() {
        $countries = DB::select('select * from const_country');
        $factories = DB::select('select * from v_factory');
        $types = DB::select('select * from const_pipe_type order by updatedate desc');
        $paytypes = DB::select('select * from const_pay_type order by id asc');
        return view('accountant.const_info', compact('countries', 'factories', 'types', 'paytypes'));
    }

    public function storeFactory(Request $request) {
        if ($request->fid == 0) {
            DB::insert("INSERT INTO const_factory (name,country_code) VALUES ('$request->fname',$request->fcountry) ");
        }
        else {
            DB::update("UPDATE const_factory SET name = '$request->fname', country_code = $request->fcountry WHERE id = $request->fid");
        }
        return redirect('const_info');
    }
    public function removeFactory($fid) {
        $count = DB::select("SELECT count(*) as cnt FROM product_main where factory_id=$fid")[0]->cnt;
        if($count==0) {
            DB::delete("DELETE FROM const_factory WHERE id = $fid");
        }
        else {
            Session::flash('error',"Энэ үйлдвэрт $count бүтээгдэхүүн /Ерөнхий/ бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('const_info');
    }



    public function storePipeType(Request $request) {
        if ($request->tid == 0) {
            DB::insert("INSERT INTO const_pipe_type (name) VALUES ('$request->tname') ");
        }
        else {
            DB::update("UPDATE const_pipe_type SET name = '$request->tname' WHERE id = $request->tid");
        }
        return redirect('const_info');
    }
    public function removePipeType($tid) {
        $count = DB::select("SELECT count(*) as cnt FROM product_main where pipe_type_id=$tid")[0]->cnt;
        if($count==0) {
            DB::delete("DELETE FROM const_pipe_type WHERE id = $tid");
        }
        else {
            Session::flash('error',"Энэ төрөлд $count бүтээгдэхүүн /Ерөнхий/ бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('const_info');
    }



    public function storePayType(Request $request) {
        if ($request->pid == 0) {
            DB::insert("INSERT INTO const_pay_type (name) VALUES ('$request->pname') ");
        }
        else {
            DB::update("UPDATE const_pay_type SET name = '$request->pname' WHERE id = $request->pid");
        }
        return redirect('const_info');
    }
    public function removePayType($pid) {
        $count = DB::select("SELECT count(*) as cnt FROM order_payments where paytype=$pid")[0]->cnt;
        if($count==0) {
            DB::delete("DELETE FROM const_pay_type WHERE id = $pid");
        }
        else {
            Session::flash('error',"Энэ төрөлд $count төлбөр төлөлт бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('const_info');
    }



   /* public function customers() {
        $customers = DB::select('select * from customers');
        return view('accountant.customers', compact('customers'));
    }
    public function storeCustomer(Request $request) {
        if ($request->cid == 0) {
            DB::insert("INSERT INTO customers (name,register) VALUES ('$request->name',$request->register) ");
        }
        else {
            DB::update("UPDATE customers SET name = '$request->name', register = $request->register WHERE id = $request->cid");
        }
        return redirect('customers');
    }
    public function removeCustomer($cid) {
        $count = DB::select("SELECT count(*) as cnt FROM orders where customer=$cid")[0]->cnt;
        if($count==0) {
            DB::delete("DELETE FROM customers WHERE id = $cid");
        }
        else {
            Session::flash('error',"Харилцагчид $count падаан бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('customers');
    }*/
    // shops
    public function shops() {
        $shops = DB::select('SELECT * FROM shops s , const_shop_type t , const_shop_state c
                                where s.shop_type=t.type_id and s.shop_state=c.state_id order by type_id,shop_id');
        $const_shop_type = DB::select('SELECT * FROM const_shop_type');
        $const_shop_state = DB::select('SELECT * FROM const_shop_state');
        return view('accountant.shop', compact('shops','const_shop_type','const_shop_state'));
    }
    public function store_stores(Request $request) {

        if ($request->id == 0) {
            DB::insert("INSERT INTO `shops`
            (
            `shop_type`,
            `shop_name`,
            `shop_state`)
            VALUES
            (
             $request->const_shop_type,
             '$request->shop_name',
             $request->const_shop_state)");

        }
        else {
            DB::update("UPDATE `shops`
            SET
            `shop_type` = '$request->const_shop_type',
            `shop_name` =  '$request->shop_name',
            `shop_state` = '$request->const_shop_state'
            WHERE `shop_id` =$request->id");

        }
        return redirect('shops');
    }
    public function removeStore($uid) {
        // $count = DB::select("SELECT count(*) as cnt FROM orders where uid=$uid")[0]->cnt;
         $count = 0;
         if($count==0) {
             DB::delete("DELETE FROM shops WHERE shop_id = $uid");
         }
         else {
             Session::flash('error',"Дэлгүүрт  $count бараа бүртгэгдсэн байна. Устгах боломжгүй.");
         }
         return redirect('shops');
     }
    // USER
    public function users() {
        $users = DB::select('select * from users,shops where users.shop_id=shops.shop_id');
        $roles = DB::select('select * from const_user_role');
        $shops = DB::select('select * from shops');
        return view('accountant.users', compact('users', 'roles','shops'));
    }
    public function storeUser(Request $request) {
        if($request->pass != $request->pass2) {
            Session::flash('error','Баталгаажуулах нууц үг таарахгүй байна.');
            return redirect('users');
        }
        if ($request->id == 0) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->shop_id = $request->shop_id;
            $user->password = Hash::make($request->pass);
            $user->save();
        }
        else {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->shop_id = $request->shop_id;
            $user->password = Hash::make($request->pass);
            $user->save();
        }
        return redirect('users');
    }

    public function removeUser($uid) {
       // $count = DB::select("SELECT count(*) as cnt FROM orders where uid=$uid")[0]->cnt;
        $count = 0;
        if($count==0) {
            DB::delete("DELETE FROM users WHERE id = $uid");
        }
        else {
            Session::flash('error',"Хэрэглэгчид $count падаан бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('users');
    }
}
