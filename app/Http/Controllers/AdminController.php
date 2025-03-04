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
        if (Auth::id()) {
            $role = Auth::user()->role;

            if ($role == 'user') {
                return view('user/index',['posts' => Post::get()]);
            } else if ($role == 'admin') {
                return view('admin/index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function viewAddPost()
    {
        return view('admin/addBlog');
    }

    public function AddPost(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $user_type = Auth::user()->role;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
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
        return view('admin/viewBlog', ['posts' => Post::get()]);
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->back()->with('message', 'Product deleted Successfully');
    }
    public function viewEdit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin/viewEdit', ['post' => $post]);
    }

    public function editPost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('adminViewPost')->with('message', 'Post updated successfully');
    }

    public function viewUser()
    {
        return view('admin/viewUser', ['users' => User::get()]);
    }

    public function viewUserEdit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin/viewUserEdit', ['user' => $user]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->role = $request->role;

        $user->save();
        return redirect()->route('adminViewUser')->with('message', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('message', 'User deleted Successfully');
    }

}
