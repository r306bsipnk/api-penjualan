<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/product')->group(function(){
    Route::get('/', [ProductController::class, 'all']);
    Route::post('/', [ProductController::class, 'store']);
    Route::delete('/', [ProductController::class, 'delete']);
 
});