<?php

namespace App\Http\Controllers;

use App\Models\User;
use illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $role = Auth::user()->role;

            if($role == 'user'){
                return view('dashboard');
            }
            else if($role == 'admin'){
                return view('admin/index');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function addBlog()
    {
        return view('admin/addBlog');
    }

}    
