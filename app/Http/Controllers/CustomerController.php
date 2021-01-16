<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class CustomerController extends Controller
{
    public function displayform()
    {
        return view('/users/customer/customer');
    }
    public function save(Request $request)
    {
        $cust_name = $request->input('cust_name');
        $cust_phone = $request->input('cust_phone');
        $cust_email = $request->input('cust_email');
        
        DB::insert('insert into customers (cust_name,cust_phone,cust_email) values (?,?,?)'
        , [$cust_name,$cust_phone,$cust_email]);

        return redirect('/customerview') ->with ('success','Data Saved');
    }

    public function viewtable()
    {
        return view('/users/customer/customerview');
    }

    public function index()
    {
        $customers = DB::table('customers')
                    ->select('customers.*')
                    ->orderBy('cust_id', 'DESC')
                    ->paginate(10);
        return view('/users/customer/customerview', compact('customers'));
    
    }

    public function edit_customer($cust_id){
        $customers = DB::select('select * from customers where cust_id = ?',[$cust_id]);
        return view('/users/customer/customeredit',['customers' => $customers]);
    }

    public function update_customer(Request $request,$cust_id){
        $cust_name = $request->input('cust_name');
        $cust_phone = $request->input('cust_phone');
        $cust_email = $request->input('cust_email');

        DB::update('update customers set cust_name = ?, cust_phone = ?, cust_email = ? where cust_id = ?'
        ,[$cust_name, $cust_phone, $cust_email, $cust_id]);

        return redirect('customerview')->with('success');
    }
}
