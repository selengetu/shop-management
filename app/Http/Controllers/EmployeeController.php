<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
use App\Employee;
class EmployeeController extends Controller {

    public function index() {
        $employee = DB::select('SELECT * FROM employees t, shops s where t.shop_id= s.shop_id');
        
        $shops = DB::select('select * from shops');
        return view('casher.employee', compact('employee','shops'));
    }
    public function store(Request $request) {
    
        if ($request->id == 0) {
            $emp = new Employee();
            $emp->shop_id = $request->shop_id;
            $emp->name = $request->name;
            $emp->day_salary = $request->day_salary;
            $emp->save();
        }
        else {
            $emp = Employee::find($request->id);
            $emp->name = $request->name;
            $emp->shop_id = $request->shop_id;
            $emp->day_salary = $request->day_salary;
            $emp->save();
        }
          
    
        return redirect('employee');
    }
    public function removeUser($uid) {
        // $count = DB::select("SELECT count(*) as cnt FROM orders where uid=$uid")[0]->cnt;
       
             DB::delete("DELETE FROM users WHERE id = $uid");
         
         return redirect('employee');
     }
    
}
