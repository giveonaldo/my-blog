<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $singlePost = Post::with('user')->first();

        $posts = Post::with('user')->take(5)->get();

        return view("home", compact("singlePost", "posts"));
    }
}
