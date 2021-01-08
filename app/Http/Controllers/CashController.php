<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Session;

class CashController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        return view('casher.cash');
    }

    //Casher Product Balance

    public function index(Request $request) {
        $shops = DB::select('SELECT type_id AS type, type_name FROM const_shop_type');
        foreach($shops as $shop) {
            $shop->shops = DB::select('SELECT shop_id AS shop, shop_name FROM shops where shop_type='.$shop->type.' and shop_state=1');
        }
        $products = DB::select("SELECT p.id, p.name, p.count_unit unit, p.count_in_box box, p.price, p.thumb_url thumb
                                FROM products p WHERE p.state=1 ORDER BY p.type, p.order_number");
        return view('casher.cash', compact('shops','products'));
    }

    public function toCatch(Request $request) {
        $json = json_decode($request->getContent());
        $products = $json->products;
        if(count($products)>0) {
            switch ($json->action) {
                case 1:
                    $this->insertBalanceWithProduct(0, $json->to_shop, 1, $json->date, $json->note, $products);
                    break;
                case 2:
                    $this->insertBalanceWithProduct($json->from_shop, $json->to_shop, 1, $json->date, $json->note, $products);
                    $this->insertBalanceWithProduct($json->to_shop, $json->from_shop, 2, $json->date, $json->note, $products);
                    break;
                case 3:
                    $this->insertBalanceWithProduct(0, $json->to_shop, 3, $json->date, $json->note, $products);
                    break;
                default:
                    break;
            }
        }
    }
    function insertBalanceWithProduct($from_shop, $to_shop, $balance_type, $date, $note, $products) {
        DB::insert('INSERT INTO `shop_balance` (`from_shop_id`,`to_shop_id`,`balance_type`, `pay_type`, `balance_date`, `balance_note`)
                        VALUES ('.$from_shop.', '.$to_shop.', '.$balance_type.', 0, \''.$date.'\', \''.$note.'\')');
        $balance_id = DB::getPdo()->lastInsertId();
        foreach($products as $product){
            DB::insert('INSERT INTO `shop_balance_item` (`balance_id`, `product_id`, `box`, `kg`, `price`, `total`)
                        SELECT '.$balance_id.', `id`, '.$product->weight.'/`count_in_box`, '.$product->weight.', '.$product->price.', '.$product->weight.'*'.$product->price.' FROM products where id='.$product->pid);
        }
        $total = DB::select('SELECT IFNULL(sum(b.total),0)*(select t.multiplier from const_balance_type t where t.type_id='.$balance_type.') total
                        FROM shop_balance_item b where b.balance_id='.$balance_id)[0]->total;
        DB::update('UPDATE shop_balance SET balance_value='.$total.' WHERE balance_id='.$balance_id);
        $this->updateBalance($balance_id);
    }
    function insertBalance($to_shop,$paytype,$value,$date,$balance_type,$note) {
        $multiplier=DB::select("select t.multiplier from const_balance_type t where t.type_id=$balance_type")[0]->multiplier;
        DB::insert('INSERT INTO `shop_balance` (`from_shop_id`,`to_shop_id`,`balance_type`, `pay_type`, `balance_value`, `balance_date`, `balance_note`)
                        VALUES (0, '.$to_shop.', '.$balance_type.', '.$paytype.', '.$value*$multiplier.', \''.$date.'\', \''.$note.'\')');
        $balance_id = DB::getPdo()->lastInsertId();
        $this->updateBalance($balance_id);
        return 0;
    }
    public function delBalance($balance_id) {
        $before = DB::select('SELECT max(b.balance_id) id, b.to_shop_id
                        FROM shop_balance b, shop_balance s
                        WHERE s.balance_id='.$balance_id.'
                        AND b.to_shop_id=s.to_shop_id
                        AND b.balance_date<=s.balance_date
                        AND b.balance_id<s.balance_id
                        GROUP BY b.to_shop_id');
        DB::delete("delete FROM shop_balance_item where balance_id = $balance_id");
        DB::delete("delete FROM shop_balance where balance_id = $balance_id");
        if(count($before)>0) {
            $balances = DB::select('SELECT balance_id id, balance_c1 c1, balance_value val, balance_c2 c2
                        FROM shop_balance WHERE to_shop_id='.$before[0]->to_shop_id.' AND balance_id>='.$before[0]->id.' ORDER BY balance_date, balance_id');
            $this->calculateBalances($balances);
        }
        return 1;
    }

    public function updateBalance($balance_id) {
        $before = DB::select('SELECT max(b.balance_id) id, b.to_shop_id
                        FROM shop_balance b, shop_balance s
                        WHERE s.balance_id='.$balance_id.'
                        AND b.to_shop_id=s.to_shop_id
                        AND b.balance_date<=s.balance_date
                        AND b.balance_id<s.balance_id
                        GROUP BY b.to_shop_id');
        if(count($before)>0) {
            $balances = DB::select('SELECT balance_id id, balance_c1 c1, balance_value val, balance_c2 c2
                        FROM shop_balance WHERE to_shop_id='.$before[0]->to_shop_id.' AND balance_id>='.$before[0]->id.' ORDER BY balance_date, balance_id');
            $this->calculateBalances($balances);
        }
        else {
            $balances = DB::select('SELECT b.balance_id id, b.balance_c1 c1, b.balance_value val, b.balance_c2 c2
                            FROM shop_balance b, shop_balance s
                            WHERE s.balance_id='.$balance_id.' AND b.to_shop_id=s.to_shop_id AND b.balance_date>=s.balance_date
                            ORDER BY b.balance_date, b.balance_id');
            $this->calculateBalances($balances);
        }
    }
    function calculateBalances($balances) {
        $c1 = 0;
        $c2 = 0;
        foreach($balances as $i=>$balance) {
            if($i==0) {
                $c1 = $balance->c1;
            }
            else {
                $c1 = $c2;
            }
            $c2 = $c1+$balance->val;
            DB::update('UPDATE shop_balance SET balance_c1 = '.$c1.',balance_c2='.$c2.' WHERE balance_id='.$balance->id);
        }
    }

    public function showBalance($shop_id) {
            return DB::select("SELECT * FROM v_shop_balance where to_shop_id = $shop_id order by balance_date desc");
    }
    public function showBalanceitem($balance_id) {
        return DB::select("SELECT * FROM v_shop_balance_item where balance_id = $balance_id");
    }
    public function orderSelected(Request $request, $id) {
        if($id==0) {
            $id = DB::table('orders')->insertGetId(['uid' => Auth::user()->id]);
        }
        $request->session()->put('orderid', $id);
        return redirect('cash');
    }
    public function updateOrder(Request $request) {
        DB::update("UPDATE orders SET company=$request->company, customer=$request->customer WHERE id=$request->id");
        return redirect('cash');
    }
    public function delOrder(Request $request, $order) {
        DB::delete("DELETE FROM order_fee WHERE orderid=$order");
        DB::delete("DELETE FROM orders WHERE id=$order");
        $request->session()->forget('orderid');
        return redirect('cash');
    }

    public function addToOrder($order, $id) {
        DB::select("select add_fee_to_order($order, $id)");
        return redirect('cash');
    }

    public function updateFeeCount(Request $request) {
        DB::update("UPDATE order_fee SET count=$request->count, total=price*count WHERE id=$request->id");
        return redirect('cash');
    }

    public function addPayment(Request $request) {
        $result = DB::select("select add_payment($request->id, $request->paytype, $request->value) as result");
        if(sizeof($result)>0) {
            if($result[0]->result != 'ok') {
                Session::flash('error', $result[0]->result);
            }
        }
        return redirect('cash');
    }


    // Report Section
    public function priceList() {
        $items = DB::select('select * from v_product_item');
        return view('casher.pricelist', compact('items'));
    }
    public function cashreport_sel($shop_id) {
        Session::put('sel_shopid', $shop_id);
        return redirect('cashreport');
    }
    public function cashReport(Request $request) {
        if(Session::has('sel_shopid')) {
            $shop_id=Session::get('sel_shopid');
            $qry="";
        }
        $shops = DB::select('SELECT shop_id,shop_name,t.type_name,t.type_id FROM shops s, const_shop_type t
                                    where shop_state=1
                                    and s.shop_type=t.type_id order by type_id');
        $const_balance_type = DB::select('SELECT * FROM const_balance_type where type_id<>4');
        $const_pay_type = DB::select('SELECT id,name FROM const_pay_type where id>0');
        $const_balance_type = DB::select('SELECT type_id,type_name FROM const_balance_type where type_id in (5,6,7,8,9)');
        return view('casher.cashreport', compact('shops','const_balance_type','const_pay_type','const_balance_type'));
    }



    /* Income
    public function income(Request $request) {
        $shops = DB::select('SELECT shop_id,shop_name FROM shops where shop_state=1');
        $const_pay_type = DB::select('SELECT id,name FROM const_pay_type where id>0;');
        return view('casher.income', compact('shops','const_pay_type'));
    }
    public function showIncome($shopid) {
        return DB::select("SELECT * FROM shop_balance , const_pay_type where  shop_balance.pay_type=const_pay_type.id  and to_shop_id=$shopid order by balance_date desc");
    }
*/
    // remain
    public function remain(Request $request) {
        $shops = DB::select('SELECT shop_id,shop_name,parent_id FROM shops where shop_state=1');
        return view('casher.remain', compact('shops'));
    }
    public function showRemain($shopid) {
        return DB::select("SELECT * FROM shop_product_balance , products where shop_product_balance.product_id=products.id and shop_product_balance.shop_id=$shopid");
    }
    public function balancereport(Request $request) {
        $balance = DB::select("SELECT
        s.shop_name
        ,DATE_FORMAT(b.balance_date, '%Y-%m-%d') balance_date,
        sum(
                CASE
                    WHEN b.balance_type=1
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'irsen',
            sum(
                CASE
                    WHEN b.balance_type=2
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'yavsan',
            sum(
                CASE
                    WHEN b.balance_type=3
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'horogdol',
            sum(
                CASE
                    WHEN b.balance_type=5
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'busad',
            sum(
                CASE
                    WHEN b.balance_type=6
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'orlogo',
            sum(
                CASE
                    WHEN b.balance_type=8
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'kass',
            sum(
                CASE
                    WHEN b.balance_type=9
                    THEN b.balance_value
                    ELSE 0
                END
            ) AS 'tuslah'
        FROM
         shop_balance b,shops s where b.to_shop_id=s.shop_id and  DATE_FORMAT(b.balance_date, '%Y-%m-%d') between '2020-07-01' and '2020-09-01'
        group by s.shop_name,DATE_FORMAT(b.balance_date, '%Y-%m-%d')
        order by DATE_FORMAT(b.balance_date,'%Y-%m-%d')");
        $shops=DB::select("SELECT * FROM shops s , const_shop_type c where s.shop_type=c.type_id");
        return view('casher.balance', compact('balance','shops'));
    }
    public function getbalanceDetail($date1,$date2,$typeid,$shopid) {
        return DB::select("SELECT t.type_name,s.balance_value*t.multiplier balance_value,s.balance_note,DATE_FORMAT(s.balance_date, '%Y-%m-%d')  balance_date
                            FROM shop_balance s ,const_balance_type t
                            where s.to_shop_id=$shopid
                            and s.balance_type=t.type_id
                            and s.balance_type=$typeid
                            and DATE_FORMAT(s.balance_date, '%Y-%m-%d') between '$date1' and '$date2'");
    }
    public function getbalance($date1,$date2,$shop_id) {
        return DB::select("SELECT
        s.shop_name
        ,DATE_FORMAT(b.balance_date, '%Y-%m-%d') balance_date,
        sum(
                CASE
                    WHEN b.balance_type=1
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'irsen',
            sum(
                CASE
                    WHEN b.balance_type=2
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'yavsan',
            sum(
                CASE
                    WHEN b.balance_type=3
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'horogdol',
            sum(
                CASE
                    WHEN b.balance_type=5
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'busad',
            sum(
                CASE
                    WHEN b.balance_type=6
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'orlogo',
            sum(
                CASE
                    WHEN b.balance_type=8
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'kass',
            sum(
                CASE
                    WHEN b.balance_type=9
                    THEN b.balance_value*c.multiplier
                    ELSE 0
                END
            ) AS 'tuslah'
        FROM
         shop_balance b,shops s , const_balance_type c
         where b.to_shop_id=s.shop_id and  DATE_FORMAT(b.balance_date, '%Y-%m-%d') between '$date1' and '$date2'
         and c.type_id=b.balance_type and s.shop_id=$shop_id
        group by s.shop_name,DATE_FORMAT(b.balance_date, '%Y-%m-%d')
        order by DATE_FORMAT(b.balance_date,'%Y-%m-%d')");

    }
}
