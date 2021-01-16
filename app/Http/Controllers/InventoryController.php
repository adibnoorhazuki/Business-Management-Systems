<?php

namespace App\Http\Controllers;
use Auth;
use DB;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function displayinventory(){
        return view('/users/inventory/inventory');
    }

    /********************************INSERT INVENTORY TO DB******************************/
    public function save(Request $request){
        $item_name = $request->input('item_name');
        $item_date_in = $request->input('item_date_in');
        $item_price = $request->input('item_price');
        $item_qty = $request->input('item_qty');

        DB::insert('insert into inventory (item_name,item_date_in,item_price,item_qty) values (?,?,?,?)'
        ,[$item_name,$item_date_in,$item_price,$item_qty]);

        return redirect('inventoryview')->with('success');
    }

    /********************************VIEW INVENTORY AFTER INSERT DATA******************************/
    public function viewinventory(){
        return view('inventoryview');
    }

    
    public function index(){
        $inventory = DB::table('inventory')
                    ->select('inventory.*')
                    ->orderBy('item_id', 'DESC')
                    ->paginate(10);
        return view('users/inventory/inventoryview',['inventory'=>$inventory]);
    }

    /********************************UPDATE INVENTORY TO DB******************************/
    
    public function edit_inventory($item_id){
        $inventory = DB::select('select * from inventory where item_id = ?',[$item_id]);
        return view('users/inventory/inventoryedit',['inventory'=>$inventory]);
    }

    public function update_inventory(Request $request,$item_id){
        $item_name = $request->input('item_name');
        $item_date_in = $request->input('item_date_in');
        $item_price = $request->input('item_price');
        $item_qty = $request->input('item_qty');

        DB::update('update inventory set item_name = ?, item_date_in = ?, item_price = ?, item_qty =? where item_id = ?'
        ,[$item_name, $item_date_in, $item_price, $item_qty, $item_id]);
        return redirect('inventoryview')->with('success');
    }

    /********************************DELETE INVENTORY FROM DB******************************/
    public function delete_inventory($item_id){
        DB::delete('delete from inventory where item_id = ?', [$item_id]);
        return redirect('inventoryview')->with('success');
    }
}
