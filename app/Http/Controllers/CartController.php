<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Sale;

class CartController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }


    public function addCart(Request $request)
    {
    	$data = [];
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['qty'] = $request->qty;
    	$data['price'] = $request->price;
    	$add  = Cart::add($data);

    	if($add) {

           session()->flash('msg', 'Product Added in Cart ');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Cart Add failed');
            return redirect()->back();
 
    	}
    }



    public function updateCart(Request $request, $rowId)
    {
    	$qty = $request->qty;
    	$updatecrat = Cart::update($rowId, $qty);

    	if($updatecrat) {

           session()->flash('msg', 'Cart Updated  successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Cart Update  failed');
            return redirect()->back();
 
    	}

    }



    public function removeSingleCart(Request $request, $rowId)
    {
    	$removeCart = Cart::remove($rowId);


    	if($removeCart) {
 			
           session()->flash('msg', 'Cart Remove  failed');
            return redirect()->back();

    	} else {
           session()->flash('msg', 'Cart Remove  successfully');
            return redirect()->back();
 
    	}
    }



    public function createSale(Request $request)
    {

    	$data = [];
    	foreach(Cart::content() as $row) {

			$data = [
				'product_id' => $row->id,
				'sale_price' => $row->price,
				'sale_quantity' => $row->qty,
				'sale_payment' => $row->price * $row->qty,
			];			
			$sale = Sale::insert($data);
			Cart::remove($row->rowId);

        }

         

        if ($sale) {
          		session()->flash('msg', 'Product Sale  successfully');
                return redirect()->back();
          	} else {
          		session()->flash('msg', 'Product sale  Failed');
                return redirect()->back();
          	}
    
    }


}
