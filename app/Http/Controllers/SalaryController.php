<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
use App\Salary;
use Illuminate\Support\Facades\Input;
class SalaryController extends Controller {

    public function index() {
        $sshop_id = Input::get('sshop_id');
        $semp_id = Input::get('semp_id');
        $query="";
      
        if(Session::has('sshop_id')) {
            $sshop_id = Session::get('sshop_id');

        }
        else {
            Session::put('sshop_id', $sshop_id);
        }
     
        if(Session::has('semp_id')) {
            $semp_id = Session::get('semp_id');

        }
        else {
            Session::put('semp_id', $semp_id);
        }
       
        if ($semp_id!=NULL && $semp_id !=0) {
            $query.=" and s.emp_id = '".$semp_id."'";

        }
        else
        {
            $query.=" ";
        }
        if ($sshop_id!=NULL && $sshop_id !=0) {
            $query.=" and s.shop_id = '".$sshop_id."'";

        }
        else
        {
         
            $query.=" ";

        }
     
        $salary = DB::select('SELECT s.*, e.name, h.shop_name FROM banana.emp_salary s, employees e, shops h
        where s.shop_id=h.shop_id and e.id=s.emp_id'.$query.'');
        $shop = DB::select('SELECT * FROM shops');
        $emp = DB::select('SELECT * FROM employees');
        return view('accountant.salary', compact('salary','emp', 'shop', 'sshop_id', 'semp_id'));
    }
    public function store(Request $request) {
        if ($request->id == 0) {
            $sal = new Salary();
            $sal->shop_id = $request->shop_id;
            $sal->emp_id = $request->emp_id;
            $sal->salary_date = $request->salary_date;
            $sal->salary = $request->salary;
            $sal->save();

        }
        else {
            DB::update("UPDATE `emp_salary`
            SET
            `shop_id` = '$request->shop_id',
            `emp_id` =  '$request->emp_id',
            `salary` = '$request->salary',
            `salary_date` = '$request->salary_date'
            WHERE `id` =$request->id");

        }
        
          
        
       
    
        return redirect('salary');
    }
    public function remove($uid) {
        // $count = DB::select("SELECT count(*) as cnt FROM orders where uid=$uid")[0]->cnt;
       
             DB::delete("DELETE FROM emp_salary WHERE id = $uid");
         
         return redirect('salary');
     }
     public function filter_emp($semp_id) {
        
        Session::put('semp_id',$semp_id);
        return back();
    }
    public function filter_shop($sshop_id) {
        Session::put('sshop_id',$sshop_id);
  
        return back();
    }
}
