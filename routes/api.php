<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

 
// index, show, destory, store 
// Route::apiResource("test", TestController::class);
Route::get("test", [TestController::class, "robika"]);
 