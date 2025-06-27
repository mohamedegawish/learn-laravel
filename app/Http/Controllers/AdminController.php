<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function index(){
        return view("index");
    }
    public function test(){
        return view("test");
    }
    public function addDoctor(){
       Doctor::factory(50)->create();
       return response("succes ",201);
    }
    public function viewDoctors(){
        $doctors=Doctor::cursorPaginate(5);
        return view("admin/doctors",["doctors"=>$doctors]);
    }
    public function addProgram(){
        Program::create([
            "id"=>1,
            'name'=>"Cyber Security",
            "describtion"=>"describtion describtion describtion describtion describtion describtion describtion "
        ]);
        return redirect("admin/programs");
    }
    public function ViewPrograms(){
        $programs=Program::all();
        return view("admin/programs",["programs"=>$programs]);
    }
    //هنا ربطت البرنامج بالدكتور
    public function testMany(){
        $doctor1=Doctor::find(1);
        $doctor1->programs()->attach([1]);
        return response()->json(([
            'doctor1'=>$doctor1->programs

        ]));
    }
}
