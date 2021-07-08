<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Validator;
use DB;


class SaleController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addSale()
    {

    	$data = [];
    	$data['products'] = Product::all();
    	return view('layouts.add_sale', $data);
    }



    public function storeSale(Request $request)
    {
        // return $request->all();
  
    	$validator = Validator::make($request->all(), [
    		'product_id' => 'required',
    		'sale_price' => 'required',
    		'sale_quantity' => 'required',

    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $data = [];
        for ($i = 0; $i < count($request->product_id); $i++) {
            $payment = 0;
            $payment = ($request->sale_quantity[$i] * $request->sale_price[$i]); 

        $data[] = [
            'product_id' => $request->product_id[$i],
            'sale_price' => $request->sale_price[$i],
            'sale_quantity' => $request->sale_quantity[$i],
            'sale_payment' => $payment,
            'sale_desc' => $request->sale_desc[$i]

        ];
    }

    	$sale = DB::table('sales')->insert($data);
    	if($sale) {

           session()->flash('msg', 'Sale Purchase successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Sale Purchase failed');
            return redirect()->back();
 
    	} 
    }


    public function showAllSale()
    {
    	$data = [];
    	$data['sales'] = Sale::join('products', 'sales.product_id', '=', 'products.id')
             ->select('sales.*', 'products.product_name')->get();
    	
    	return view('layouts.all_sale', $data);
    }


    public function deleteSale($id)
    {
    	$deleteSale = Sale::where('id', $id)->delete();

    	if ($deleteSale) {
    		
    		session()->flash('msg', 'Sale deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Sale deletion failed');
            return redirect()->back();
    	}
    }



    public function editSale($id)
    {
        $data = [];
        $data['products'] = Product::all();
        $data['sale'] = Sale::where('id', $id)->first();
        return view('layouts.edit_sale',$data);
    }




    public function updateSale(Request $request, $id)
    {
  
    	$validator = Validator::make($request->all(), [
    		'product_id' => 'required',
    		'sale_price' => 'required|numeric',
    		'sale_quantity' => 'required',
    		'sale_payment' => 'required',

    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['product_id'] = $request->product_id;
    	$data['sale_price'] = $request->sale_price;
    	$data['sale_quantity'] = $request->sale_quantity;
    	$data['sale_payment'] = $request->sale_payment;
    	$data['sale_desc'] = $request->sale_desc;


    	$stock = DB::table('sales')->where('id', $id)->update($data);
    	if($stock) {

           session()->flash('msg', 'Sale Purchase Update successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Sale Purchase Update failed');
            return redirect()->back();
 
    	} 
    }





}
