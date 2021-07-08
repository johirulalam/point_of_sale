<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class PosController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addPos()
    {
    	$data = [];
    	$data['products'] = Product::all();
    	return view('layouts.pos', $data);
    }

}
