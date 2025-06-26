<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $Projects=Project::all();
        $customer=Customer::all();
        return view("admin.projects",["Projects"=>$Projects,"Customers"=>$customer]);
    }
    public function create(){
        Project::create(['projectName'=>'Kataketo',
        'customer_id'=>1
    ]);
    return redirect("/admin/projects");
    }
    public function show($id){
        $project=Project::find($id);
        return view("admin.show",['project'=>$project]);
    }
}
