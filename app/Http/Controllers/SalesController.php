<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
    public function displaysales()
    {
        return view('/users/sales/salesform');
    }

    public function select()
    {

        $customer = DB::select('select * from customers');
        $inventory = DB::select('select * from inventory');
        
        return view('/users/sales/salesform', ['inventory'=>$inventory, 'customers'=>$customer]);

    }

    public function save(Request $request)
    {
        $sales_date_in = $request->input('sales_date_in');
        $cust_name = $request->input('sales_cust_id');
        $item_name = $request->input('sales_item_id');
        $sales_desc = $request->input('sales_desc');
        $sales_total = $request->input('sales_total');
        $sales_amount_received = $request->input('sales_amount_received');
        $sales_balance = $request->input('sales_balance');

        DB::insert('insert into sales (sales_date_in,sales_cust_id,sales_item_id, sales_desc, sales_total, sales_amount_received, sales_balance) values (?,?,?,?,?,?,?)'
        ,[$sales_date_in,$cust_name,$item_name,$sales_desc,$sales_total,$sales_amount_received,$sales_balance]);

        return redirect('viewsales')->with('success');
    }

    public function viewform()
    {
        return view('/users/sales/viewsales');
    }

    public function index()
    {
        $sales = DB::table('sales')
            ->join('inventory', 'inventory.item_id', '=', 'sales_item_id')
            ->join('customers', 'customers.cust_id', '=', 'sales_cust_id')
            ->select('sales.*', 'inventory.item_name', 'customers.cust_name')
            ->orderBy('sales_date_in', 'DESC')
            ->paginate(10);
        return view('/users/sales/viewsales', compact('sales'));
    }
}
