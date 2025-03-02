<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Post;

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
     
    public function viewAddPost()
    {
        return view('admin/addBlog');
    }

    public function AddPost( Request $request)
    {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $user_type = Auth::user()->role; 

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->description;
        $post->image = $imagename;
        $post->user_id = $user_id;
        $post->user_name = $user_name;
        $post->user_type = $user_type;
        $post->save();
        return redirect()->back()->with('message', 'Post Added Successfully');
    }


    public function viewPost()
    {
        return view('admin/viewBlog');
    }

}    
