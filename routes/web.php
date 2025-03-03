<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::get('/',[HomeController::class,'homeView'])->name('landingPage');
Route::get('/home', [AdminController::class,'index'])->name('home');

//admin route
Route::get('/home/viewAddBlog', [AdminController::class,'viewAddPost'])->name('adminViewAddPost');
Route::view('/adminHome', 'admin/index')->name('adminHome');
Route::post('/home/addBlog', [AdminController::class,'addPost'])->name('adminAddPost');
Route::get('/home/viewBlog', [AdminController::class,'viewPost'])->name('adminViewPost');
Route::get('/home/deleteBlog/{id}', [AdminController::class,'deletePost'])->name('adminDeletePost');
Route::get('/home/editBlog/{id}', [AdminController::class,'viewEdit'])->name('adminViewEdit');
Route::put('/home/editBlog/{id}', [AdminController::class,'editPost'])->name('adminEditPost');

//user route
Route::get('/post/{id}', [UserController::class, 'viewPost'])->name('userViewPost');
Route::post('/comments/store/{id}', [UserController::class, 'storeComment'])->name('userStoreComment');


