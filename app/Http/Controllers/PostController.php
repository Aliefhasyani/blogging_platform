<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('tag')->get();
        return view('posts',compact('posts'));
    }

    public function show($id){
        $post = Post::with('tag')->findOrFail($id);

        return view('post_content',compact('post'));
    }
}
