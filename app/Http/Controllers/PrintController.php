<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Session;

class PrintController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    function ZarlagiinPadaan($orderid) {
        $orders = DB::select("select * from v_orders where id=$orderid");
        if(sizeof($orders) > 0) {
            if($orders[0]->state != 2) {
                Session::flash('error', 'Төлбөр төлөгдөөгүй байна');
            }
            else {
                Session::forget('error');
            }
            $fees = DB::select("select * from order_fee where orderid=$orderid order by created asc");            
            return view('print.print_zp', compact('orders', 'fees'));
            
        }
        echo "Захиалга олдсонгүй";
    }
    
}
