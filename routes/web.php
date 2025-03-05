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
Route::get('/home/addUser', [AdminController::class,'viewAddUser'])->name('adminViewAddUser');
Route::put('/home/editBlog/{id}', [AdminController::class,'editPost'])->name('adminEditPost');
Route::get('/home/viewUser', [AdminController::class,'viewUser'])->name('adminViewUser');
Route::get('/home/editUser/{id}', [AdminController::class,'viewUserEdit'])->name('adminViewUserEdit');
Route::put('/home/editUser/{id}', [AdminController::class,'editUser'])->name('adminEditUser');
Route::get('/home/deleteUser/{id}', [AdminController::class,'deleteUser'])->name('adminDeleteUser');
Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('adminAddUser');



//user route
Route::get('/post/{id}', [UserController::class, 'viewPost'])->name('userViewPost');
Route::post('/comments/store/{id}', [UserController::class, 'storeComment'])->name('userStoreComment');
Route::post('/like/{id}', [UserController::class, 'addLike'])->name('userAddLike');




