<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
{
    if (Auth::id()) {
        $role = Auth::user()->role;
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalComments = Comment::count();

        if ($role == 'user') {
            return view('user/index', ['posts' => Post::with('categories')->get()]);
        } else if ($role == 'admin') {
            return view('admin/index', [
                'totalUsers' => $totalUsers,
                'totalPosts' => $totalPosts,
                'totalComments' => $totalComments
            ]);
        } else {
            return redirect()->back();
        }
    }
}


    public function viewAddPost()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin/addBlog', compact('categories'));
    }
    public function viewAddUser()
    {

        return view('admin/adduser');
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
        if ($request->has('categories')) {
            $post->categories()->sync($request->categories);
        }

        return redirect()->back()->with('message', 'Post Added Successfully');
    }


    public function addUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:user,admin'
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->role = $request->role;
    $user->save();

    return redirect()->back()->with('message', 'User added successfully!');
}


    public function viewPost()
    {
        return view('admin/viewBlog', [
            'posts' => Post::with('categories')->get()->reverse()

        ]);
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

    public function viewBlogSite()
    {
        return view('user/index', ['posts' => Post::get()]);
    }

}
