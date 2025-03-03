<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewPost($id)
{
    $post = Post::find($id);
    $comments = Comment::where('post_id', $id)->get();
    
    return view('user/viewBlog', [
        'post' => $post,
        'comments' => $comments
    ]);
}
     
    
public function storeComment(Request $request, $id)
{
    $post = Post::find($id);
    $user_id = Auth::user()->id;
    $user_name = Auth::user()->name;

    $comment = new Comment();
    $comment->content = $request->comment;
    $comment->user_id = $user_id;
    $comment->user_name = $user_name;
    $comment->post_id = $post->id;
    $comment->save();

    // Redirect back to the post view to avoid form resubmission on refresh
    return redirect()->route('userViewPost', ['id' => $post->id]);
}

    
}
