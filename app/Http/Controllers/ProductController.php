<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;


class ProductController extends Controller
{
    //

   
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addProduct()
    {
    	return view('layouts.add_product');
    }




    public function storeProduct(Request $request)
    {
  
    	$validator = Validator::make($request->all(), [
    		'product_name' => 'required',
            'product_price' => 'required',
            'product_code' => 'required|unique:products',
    		'product_desc' => 'required',
    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_code'] = $request->product_code;
    	$data['product_desc'] = $request->product_desc;



    	$product = DB::table('products')->insert($data);
    	if($product) {

           session()->flash('msg', 'Product insert successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Product insert failed');
            return redirect()->back();
 
    	} 
    }   



    public function showAllProduct()
    {
    	$data = [];
    	$data['products'] = Product::all();
    	return view('layouts.all_product', $data);
    }


    public function deleteProduct($id)
    {
    	$deleteProduct = Product::where('id', $id)->delete();

    	if ($deleteProduct) {
    		
    		session()->flash('msg', 'Product deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Product deletion failed');
            return redirect()->back();
    	}
    }


    public function editProduct($id)
    {
        $data = [];
        $data['product'] = Product::where('id', $id)->first();
        return view('layouts.edit_product',$data);
    }



    public function updateProduct(Request $request, $id)
    {
  
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
            'product_desc' => 'required',
        ]);

       if ($validator->fails()) 
       {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_code'] = $request->product_code;



        $product = DB::table('products')->where('id', $id)->update($data);
        if($product) {

           session()->flash('msg', 'Product Update successfully');
            return redirect()->back();

        } else {

           session()->flash('msg', 'Product Update failed');
            return redirect()->back();
 
        } 
    }   



}
