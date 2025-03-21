<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customer(){
        $customers=Customer::all();
        return view('customers.customer',compact('customers'));
    }
    public function edit($id){
        $customers=Customer::findOrFail($id);
        return view('customers.edit',compact('customers'));
    }
    public function update(Request $request,$id){
        $customer=Customer::findOrfail($id);

        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->save();

        return redirect()->route('customer')->with('success', 'ข้อมูลลูกค้าอัปเดตเรียบร้อย');
    }
}
