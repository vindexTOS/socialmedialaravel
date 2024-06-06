<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;


// index, show, destory, store 
// Route::apiResource("test", TestController::class);
Route::post("/auth", [AuthController::class, "store"]);

//  user authentication registration 

