<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class CashController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addCash()
    {
    	return view('layouts.add_cash');
    }




    public function storeCash(Request $request)
    {
  
    	$validator = Validator::make($request->all(), [
    		'cash' => 'required',
    		'cash_amount' => 'required',
    		'cash_source' => 'required',
    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['cash_in_out'] = $request->cash;
    	$data['cash_amount'] = $request->cash_amount;
    	$data['cash_source'] = $request->cash_source;



    	$cash = DB::table('cashes')->insert($data);
    	if($cash) {

           session()->flash('msg', 'cash insert successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Cash insert failed');
            return redirect()->back();
 
    	} 
    }


    public function showAllCash()
    {
    	$data = [];
    	$data['cashes'] = Cash::all();
    	return view('layouts.all_cash', $data);
    }



    public function deleteCash($id)
    {
    	$deleteCash = Cash::where('id', $id)->delete();

    	if ($deleteCash) {
    		
    		session()->flash('msg', 'Cash deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Cash deletion failed');
            return redirect()->back();
    	}
    }



    public function editCash($id)
    {
        $data = [];
        $data['cash'] = Cash::where('id', $id)->first();
        return view('layouts.edit_cash',$data);
    }



    public function updateCash(Request $request, $id)
    {
  
        $validator = Validator::make($request->all(), [
            'cash' => 'required',
            'cash_amount' => 'required',
            'cash_source' => 'required',
        ]);

       if ($validator->fails()) 
       {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
        $data['cash_in_out'] = $request->cash;
        $data['cash_amount'] = $request->cash_amount;
        $data['cash_source'] = $request->cash_source;



        $cash = DB::table('cashes')->where('id', $id)->update($data);
        if($cash) {

           session()->flash('msg', 'cash update successfully');
            return redirect()->back();

        } else {

           session()->flash('msg', 'Cash update failed');
            return redirect()->back();
 
        } 
    }


}
