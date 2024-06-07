<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_customer()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_customer');
            }
            else{
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
       
    }
    public function Store(Request $request)
    {
        $customer= new customer();
        $customer['name']=$request->name;
        $customer['email']=$request->email;
        $customer['phone']=$request->phone;
        $customer['address']=$request->address;

        $customer->save();

        return redirect()->back()->with('message', 'Customer Added Successfully');
    }
    public function all_customer()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
        $data = customer::all();

        return view('admin.all_customer', compact('data'));
            }
            else {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function deletecustomer($id)
    {

        $data=customer::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update_customer($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
        $data = customer::find($id);

        return view('admin.update_customer', compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function edit_customer(Request $request, $id)
    {
        $customer = customer::find($id);

        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->address=$request->address;

        $customer->save();

        return redirect()->back()->with('message','Customer Details Updated Successfully.');

    }
}


