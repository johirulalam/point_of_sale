<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class EmployeeController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addEmployee()
    {
    	return view('layouts.add_employee');
    }

    public function storeEmployee(Request $request)
    {
  
    	$validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required|unique:employees',
    		'address' => 'required',
    		'phone' => 'required',
    		'nid' => 'required',
    		'salary' => 'required',

    	]);

       if ($validator->fails()) 
       {
            return redirect()
            			->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['nid'] = $request->nid;
    	$data['salary'] = $request->salary;


    	$employee = DB::table('employees')->insert($data);
    	if($employee) {

           session()->flash('msg', 'Employee insert successfully');
            return redirect()->back();

    	} else {

           session()->flash('msg', 'Employee insert failed');
            return redirect()->back();
 
    	} 
    }


    public function showAllEmployee()
    {
    	$data = [];
    	$data['employees'] = Employee::all();
    	return view('layouts.all_employee', $data);
    }


    public function deleteEmployee($id)
    {
    	$deleteEmployee = Employee::where('id', $id)->delete();

    	if ($deleteEmployee) {
    		
    		session()->flash('msg', 'Employee deleted successfully');
            return redirect()->back();
    	} else {
    		session()->flash('msg', 'Employee deletion failed');
            return redirect()->back();
    	}
    }



    public function editEmployee($id)
    {
        $data = [];
        $data['employee'] = Employee::where('id', $id)->first();
        return view('layouts.edit_employee',$data);
    }



    public function updateEmployee(Request $request, $id)
    {
  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'nid' => 'required',
            'salary' => 'required',

        ]);

       if ($validator->fails()) 
       {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['nid'] = $request->nid;
        $data['salary'] = $request->salary;


        $employee = DB::table('employees')->where('id', $id)->update($data);
        if($employee) {

           session()->flash('msg', 'Employee Update successfully');
            return redirect()->back();

        } else {

           session()->flash('msg', 'Employee Update failed');
            return redirect()->back();
 
        } 
    }
}
