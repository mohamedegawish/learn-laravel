<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $data = Customer::all();
        return view("admin.customer",["Customers"=>$data]);
    }
    public function create(){
        $Customer=Customer::create([
            "name"=> "neymar",
            "email"=> "neymar@gmail.com",
            "address"=> "address",
            "phone"=> "phone",
        ]);
        return redirect("/admin/customer");
    }
    public function show($id){
        $Customer=Customer::find($id);
        return view("admin/show",["Customer"=>$Customer]);
    }
    public function delete($id){
        Customer::destroy($id);
        return redirect("/admin/customer");
    }
}
