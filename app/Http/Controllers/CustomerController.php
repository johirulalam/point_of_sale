<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;


class CustomerController extends Controller
{
    //

   
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addCustomer()
    {
    	return view('layouts.add_customer');
    }




    public function storeCustomer(Request $request)
    {
  
    	$validator = Validator::make($request->all(), [
    		'customer_name' => 'required',
    		'customer_address' => 'required',    		
    		'customer_phone' => 'required',
    		'customer_email' => 'required',

    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_address'] = $request->customer_address;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;



    	$customer = DB::table('customers')->insert($data);
    	if($customer) {

           session()->flash('msg', 'Customer Added successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Customer insertion failed');
            return redirect()->back();
 
    	} 
    }   



    public function showAllSupplier()
    {
    	$data = [];
    	$data['suppliers'] = Supplier::all();
    	return view('layouts.all_supplier', $data);
    }


    public function deleteSupplier($id)
    {
    	$deleteSupplier = Supplier::where('id', $id)->delete();

    	if ($deleteSupplier) {
    		
    		session()->flash('msg', 'Supplier deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Supplier deletion failed');
            return redirect()->back();
    	}
    }




    public function editSupplier($id)
    {
        $data = [];
        $data['supplier'] = Supplier::where('id', $id)->first();
        return view('layouts.edit_supplier',$data);
    }



    public function updateSupplier(Request $request, $id)
    {
  
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_address' => 'required',           
            'supplier_contact_one' => 'required',
            'supplier_contact_two' => 'required',

        ]);

       if ($validator->fails()) 
       {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_address'] = $request->supplier_address;
        $data['supplier_contact_one'] = $request->supplier_contact_one;
        $data['supplier_contact_two'] = $request->supplier_contact_two;



        $supplier = DB::table('suppliers')->where('id', $id)->update($data);
        if($supplier) {

           session()->flash('msg', 'Supplier Update successfully');
            return redirect()->back();

        } else {

           session()->flash('msg', 'Supplier update failed');
            return redirect()->back();
 
        } 
    } 




    public function viewSupplier($supplier_name)
    {
        $data = [];
        $data['stocks'] = Stock::where('stock_supplier_name', $supplier_name)->get();
        return view('layouts.view_supplier',$data);
    }

}
