<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


Route::get('/',[HomeController::class,'homeView'])->name('landingPage');
Route::get('/home', [AdminController::class,'index'])->name('home');

//admin route
Route::get('/home/addBlog', [AdminController::class,'addBlog'])->name('addBlog');
Route::view('/adminHome', 'admin/index')->name('adminHome');

