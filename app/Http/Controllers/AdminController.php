<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function index(){
        $posts = Post::with('user')->get();

        return view('post',compact('posts'));
    }
}
