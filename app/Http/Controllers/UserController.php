<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Category;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewPost($id)
    {
        $post = Post::with(['likes', 'categories'])->find($id);
        $comments = Comment::where('post_id', $id)->get();
        $likeCount = $post->likes->count();
    
        return view('user/viewBlog', [
            'post' => $post,
            'comments' => $comments,
            'likeCount' => $likeCount,
            'categories' => $post->categories,  
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

        return redirect()->route('userViewPost', ['id' => $post->id]);
    }
    public function addLike($id)
    {
        $user_id = Auth::user()->id;
        $existingLike = Like::where('post_id', $id)->where('user_id', $user_id)->first();
    
        if (!$existingLike) {
            // User hasn't liked this post yet, so add a like
            $like = new Like();
            $like->post_id = $id;
            $like->user_id = $user_id;
            $like->save();
    
            $status = 'liked';
        } else {
            // User has already liked the post, so remove the like
            $existingLike->delete();
            $status = 'unliked';
        }
    
        $post = Post::with('likes')->findOrFail($id);
        $likeCount = $post->likes->count();
    
        // Return the new like status and like count as a JSON response
        return response()->json([
            'status' => $status,
            'likes_count' => $likeCount,
        ]);
    }

    public function deleteComment($id){
        $comment = Comment::where('id', $id)->first();
        $activeUser_id = Auth::user()->id;
        $commentUser_id= $comment->user_id;
        if( $commentUser_id == $activeUser_id ){
            $comment->delete();
            return redirect()->back()->with('success','Comment Deleted Successfully');
        }
        elseif(Auth::user()->role=='admin'){
            $comment->delete();
            return redirect()->back()->with('success','Comment Deleted Successfully');
        }
        else{
            return redirect()->back()->with('fail','You have not permission');
        }
    }
    
}
