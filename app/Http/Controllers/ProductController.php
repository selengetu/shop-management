<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use File;
use Session;

class ProductController extends Controller {

    // Product Main Functions

    public function index() {
        // $fid = 0;
        // if(Session::has('factory_id')) {
        //     $fid = Session::get('factory_id');
        // }
        // else {
        //     Session::put('factory_id', $fid);
        // }
        // if($fid==0) {
        //     $products = DB::select('select * from v_product_main');
        // }
        // else {
        //     $products = DB::select("select * from v_product_main where factory_id=$fid");
        // }
        $products = DB::select('SELECT
            `products`.`id`,
            `products`.`name`,
            `products`.`count_unit`,
            `products`.`thumb_url`,
            `products`.`note`,
            `products`.`cost`,
            `products`.`price` FROM products   order by products.type, products.order_number');
        return view('accountant.product_main', compact('products'));
    }

    public function storeMain(Request $request) {
        if($request->mid==0) {
            $imagePath = '';
            if($request->hasFile('mimage')) {
                $imageName = time().'.'.$request->mimage->getClientOriginalExtension();
                $path = 'images/product';
                $request->mimage->move(public_path($path), $imageName);
                $imagePath = $path.'/'.$imageName;
            }
            DB::insert("INSERT INTO `products`
            (
            `name`,
            `count_unit`,
            `thumb_url`,
            `note`,
            `cost`,
            `price`)
            VALUES
            (
            '$request->mname',
            '$request->munit',
            IF(LENGTH('$imagePath')=0,NULL,'$imagePath'),
            '$request->mnote',
            '$request->mcost',
            '$request->mprice') ");
        }
        else {
            $imagePath = DB::select("SELECT thumb_url FROM products where id=$request->mid")[0]->thumb_url;
            if($request->hasFile('mimage')) {
                if($imagePath!=null) {
                    File::delete($imagePath);
                }
                $imageName = time().'.'.$request->mimage->getClientOriginalExtension();
                $path = 'images/product';
                $request->mimage->move(public_path($path), $imageName);
                $imagePath = $path.'/'.$imageName;
            }
            DB::update("UPDATE `products`
                SET
                name = '$request->mname',
                count_unit = '$request->munit',
                thumb_url = '$imagePath',
                 note = '$request->mnote',
                `cost` ='$request->mcost',
                `price` = '$request->mprice'
                WHERE `id` = $request->mid");
        }
        return redirect('product_main');
    }

    public function removeMain($mid) {
        $count = DB::select("SELECT count(*) as cnt FROM shop_balance_item where product_id=$mid")[0]->cnt;
        if($count==0) {
            $imagePath = DB::select("SELECT thumb_url FROM products where id=$mid")[0]->thumb_url;
            if($imagePath!=null) {
                File::delete($imagePath);
            }
            DB::delete("DELETE FROM products WHERE id = $mid");
        }
        else {
            Session::flash('error',"Энэ бүтээгдэхүүнд /Ерөнхий/ $count бүтээгдэхүүн /Нэгж/ бүртгэгдсэн байна. Устгах боломжгүй.");
        }
        return redirect('product_main');
    }

    public function filterMainFactory($fid) {
        Session::put('factory_id',$fid);
        Session::put('main_id',0);
        return redirect('product_main');
    }


    // Product Item Functions
    public function item() {
        $fid = 0;
        if(Session::has('factory_id')) {
            $fid = Session::get('factory_id');
        }
        else {
            Session::put('factory_id', $fid);
        }
        if($fid==0) {
            $products = DB::select('select * from v_product_main');
        }
        else {
            $products = DB::select("select * from v_product_main where factory_id=$fid");
        }

        $mid = 0;
        if(Session::has('main_id')) {
            $mid = Session::get('main_id');
        }
        else {
            Session::put('main_id', $mid);
        }
        if($mid==0) {
            $items = DB::select('select * from v_product_item');
        }
        else {
            $items = DB::select("select * from v_product_item where mainid=$mid");
        }

        $factories = DB::select('select * from v_factory');
        return view('accountant.product_item', compact('products', 'items', 'factories', 'fid', 'mid'));
    }
    public function storeItem(Request $request) {
        if($request->iid==0) {
            DB::insert("INSERT INTO product_item
                (mainid,
                code,
                size,
                count_in_bag,
                cost,
                price)
                VALUES
                ($request->imain,
                '$request->icode',
                '$request->isize',
                '$request->ibox',
                '$request->ibag',
                '$request->icost',
                '$request->iprice'
                )
            ");
        }
        else {
            DB::update("UPDATE product_item
                SET
                mainid = $request->imain,
                code = '$request->icode',
                size = '$request->isize',
                count_in_bag = '$request->ibag',
                cost = '$request->icost',
                price = '$request->iprice'
                WHERE id = $request->iid");
        }
        return redirect('product_item');
    }
    public function removeItem($iid) {
        //Session::flash('error',"Бүтээгдэхүүн /Нэгж/ мэдээлэл устгах боломжгүй. Програмистанд хандана уу.");
        DB::delete("DELETE FROM product_item WHERE id = $iid");
        return redirect('product_item');
    }
    public function filterItemFactory($fid) {
        Session::put('factory_id',$fid);
        Session::put('main_id',0);
        return redirect('product_item');
    }
    public function filterItemMain($mid) {
        Session::put('main_id',$mid);
        return redirect('product_item');
    }
}
