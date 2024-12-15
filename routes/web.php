<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;  


Route::get('/', function () {
    return inertia::render('create');
});

Route::get('customers/create',[CustomerController::class,'create']);
Route::get('customers',[CustomerController::class,'index'])->name('customers.index');
Route::post('customers',[CustomerController::class,'store']);
Route::delete('customers/{customer}',[CustomerController::class,'destroy']);
Route::get('customers/{customer}/edit',[CustomerController::class,'edit']);
Route::put('customers/{customer}',[CustomerController::class,'update']);
Route::get('/customers/{customer}',[CustomerController::class,'show']);
