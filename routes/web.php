<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'index']);
Route::get("/course",[CourseController::class,"index"]);
Route::get("/test",[AdminController::class,"test"]);
Route::get("/admin/customer",[CustomerController::class,"index"]);
Route::get("/admin/customer/create",[CustomerController::class,"create"]);
Route::get("/admin/projects",[ProjectController::class,"index"]);
Route::get("/admin/projects/create",[ProjectController::class,"create"]);
Route::get("/admin/customer/{id}",[CustomerController::class,"show"]);
Route::get("/admin/customer/delete/{id}",[CustomerController::class,"delete"]);
Route::get("/admin/projects/{id}",[ProjectController::class,"show"]);
Route::get("/admin/doctors",[AdminController::class,"viewDoctors"]);
Route::get("/admin/doctors/new",[AdminController::class,"addDoctor"]);
Route::get("/admin/programs",[AdminController::class,"viewPrograms"]);
Route::get("/admin/programs/new",[AdminController::class,"addProgram"]);
Route::get("/admin/programs/testmany",[AdminController::class,"testMany"]);
