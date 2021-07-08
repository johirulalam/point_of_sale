<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Validator;
use DB;

class StockController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addStock()
    {

    	$data = [];
    	$data['suppliers'] = Supplier::all();
    	$data['products'] = Product::all();
    	return view('layouts.add_stock', $data);
    }



    public function storeStock(Request $request)
    {
  
    	$validator = Validator::make($request->all(), [
    		'supplier_id' => 'required',
    		'product_id' => 'required',
    		'stock_product_quantity' => 'required|numeric',
    		'stock_buy_price' => 'required',
    		'stock_sell_price' => 'required',
    		'stock_payment' => 'required|numeric',

    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['supplier_id'] = $request->supplier_id;
    	$data['product_id'] = $request->product_id;
    	$data['stock_product_desc'] = $request->stock_product_desc;
    	$data['stock_quantity'] = $request->stock_product_quantity;
    	$data['stock_buy_price'] = $request->stock_buy_price;
    	$data['stock_sell_price'] = $request->stock_sell_price;
    	$data['stock_payment'] = $request->stock_payment;


    	$stock = DB::table('stocks')->insert($data);
    	if($stock) {

           session()->flash('msg', 'Stock Purchase successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Stock Purchase failed');
            return redirect()->back();
 
    	} 
    }



    public function showAllStock()
    {
    	$data = [];
    	$data['stocks'] = Stock::join('suppliers', 'stocks.supplier_id', '=', 'suppliers.id')
             ->join('products', 'stocks.product_id', '=', 'products.id')
             ->select('stocks.*', 'suppliers.supplier_name', 'products.product_name')->get();
    	
    	return view('layouts.all_stock', $data);
    }





    public function deleteStock($id)
    {
    	$deleteStock = Stock::where('id', $id)->delete();

    	if ($deleteStock) {
    		
    		session()->flash('msg', 'Stock deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Stock deletion failed');
            return redirect()->back();
    	}
    }



    public function editStock($id)
    {
        $data = [];
        $data['suppliers'] = Supplier::all();
        $data['products'] = Product::all();
        $data['stock'] = Stock::where('id', $id)->first();
        return view('layouts.edit_stock',$data);
    }



    public function updateStock(Request $request, $id)
    {
  
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'product_id' => 'required',
            'stock_product_quantity' => 'required|numeric',
            'stock_buy_price' => 'required',
            'stock_sell_price' => 'required',
            'stock_payment' => 'required|numeric',

        ]);

       if ($validator->fails()) 
       {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
        $data['supplier_id'] = $request->supplier_id;
        $data['product_id'] = $request->product_id;
        $data['stock_product_desc'] = $request->stock_product_desc;
        $data['stock_quantity'] = $request->stock_product_quantity;
        $data['stock_buy_price'] = $request->stock_buy_price;
        $data['stock_sell_price'] = $request->stock_sell_price;
        $data['stock_payment'] = $request->stock_payment;


        $stock = DB::table('stocks')->where('id', $id)->update($data);
        if($stock) {

           session()->flash('msg', 'Stock Purchase Update successfully');
            return redirect()->back();

        } else {

           session()->flash('msg', 'Stock Purchase Update failed');
            return redirect()->back();
 
        } 
    }


}
