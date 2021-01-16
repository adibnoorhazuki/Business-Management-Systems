<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ServiceController extends Controller
{

    public function displayservice()
    {

        return view('/users/services/serviceform');
    }

    public function select()
    {

        $inventory = DB::select('select * from inventory');
        $customer = DB::select('select * from customers');
        
        return view('/users/services/serviceform', ['inventory'=>$inventory, 'customers'=>$customer]);

    }

    public function save(Request $request)
    {
        $service_date_in = $request->input('service_date_in');
        $cust_name = $request->input('service_cust_id');
        $device_name = $request->input('device_name');
        $device_model = $request->input('device_model');
        $device_color = $request->input('device_color');
        $item_name = $request->input('service_item_id');
        $service_desc = $request->input('service_desc');
        $total_amount = $request->input('total_amount');
        $amount_received = $request->input('amount_received');
        $balance = $request->input('balance');
        $status = $request->input('status');

        DB::insert('insert into services (service_date_in,service_cust_id,device_name, device_model, device_color, service_item_id, service_desc, total_amount, amount_received, balance, status) values (?,?,?,?,?,?,?,?,?,?,?)'
        ,[$service_date_in,$cust_name,$device_name,$device_model,$device_color,$item_name,$service_desc,$total_amount,$amount_received,$balance,$status]);

        return redirect('viewservice')->with('success');
    }

    public function viewform()
    {
        return view('/users/services/viewservice');
    }

    public function index()
    {
        $services = DB::table('services')
            ->join('inventory', 'inventory.item_id', '=', 'service_item_id')
            ->join('customers', 'customers.cust_id', '=', 'service_cust_id')
            ->select('services.*', 'inventory.item_name', 'customers.cust_name')
            ->orderBy('service_date_in', 'DESC')
            ->paginate(10);
        return view('/users/services/viewservice', compact('services'));
    }

    public function edit_service($service_id)
    {
        $services = DB::select('select * from services where service_id = ?',[$service_id]);
        return view('/users/services/serviceedit',['service'=>$services]);
    }
    
    public function update_service(Request $request,$service_id)
    {
        $device_name = $request->input('device_name');
        $device_model = $request->input('device_model');
        $device_color = $request->input('device_color');
        $status = $request->input('status');

        DB::update('update services set device_name = ?, device_model = ?, device_color = ?, status =? where service_id = ?'
        ,[$device_name, $device_model, $device_color, $status, $service_id]);
        return redirect('viewservice')->with('success');
    }

    public function invoice($service_id)
    {
        $invoiceserv = DB::select('select * from services where service_id = ?',[$service_id]);
        return view('/users/services/invoiceserv',['invoiceserv'=>$invoiceserv]);
    }
}
