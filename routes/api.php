<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\PostApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('posts',PostApiController::class);