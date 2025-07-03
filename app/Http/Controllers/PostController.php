<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
        return view('posts.show', compact('post'));
    }

    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        if ($user->likedPosts()->where('post_id', $post->id)->exists()) {
            $user->likedPosts()->detach($post->id);
        } else {
            $user->likedPosts()->attach($post->id);
        }

        return back();
    }
}
