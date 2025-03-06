<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::get('/',[HomeController::class,'homeView'])->name('landingPage');
Route::get('/home', [AdminController::class,'index'])->name('home');

//admin route
Route::get('/home/admin/viewAddBlog', [AdminController::class,'viewAddPost'])->name('adminViewAddPost');
Route::view('/adminHome', 'admin/index')->name('adminHome');
Route::post('/home/admin/addBlog', [AdminController::class,'addPost'])->name('adminAddPost');
Route::get('/home/admin/viewBlog', [AdminController::class,'viewPost'])->name('adminViewPost');
Route::get('/home/admin/deleteBlog/{id}', [AdminController::class,'deletePost'])->name('adminDeletePost');
Route::get('/home/admin/editBlog/{id}', [AdminController::class,'viewEdit'])->name('adminViewEdit');
Route::get('/home/admin/addUser', [AdminController::class,'viewAddUser'])->name('adminViewAddUser');
Route::put('/home/admin/editBlog/{id}', [AdminController::class,'editPost'])->name('adminEditPost');
Route::get('/home/admin/viewUser', [AdminController::class,'viewUser'])->name('adminViewUser');
Route::get('/home/admin/editUser/{id}', [AdminController::class,'viewUserEdit'])->name('adminViewUserEdit');
Route::put('/home/admin/editUser/{id}', [AdminController::class,'editUser'])->name('adminEditUser');
Route::get('/home/admin/deleteUser/{id}', [AdminController::class,'deleteUser'])->name('adminDeleteUser');
Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('adminAddUser');
Route::get('/admin/viewBlog', [AdminController::class, 'viewBlogSite'])->name('adminViewBlogSite');



//user route
Route::get('/user/post/{id}', [UserController::class, 'viewPost'])->name('userViewPost');
Route::post('/user/comments/store/{id}', [UserController::class, 'storeComment'])->name('userStoreComment');
Route::post('/user/like/{id}', [UserController::class, 'addLike'])->name('userAddLike');
Route::get('/user/comment/{id}', [UserController::class, 'deleteComment'])->name('userDeleteComment');




