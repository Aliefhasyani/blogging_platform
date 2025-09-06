<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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

    public function postManagement(){

        $posts = Post::with('user')->get();
        $postsCount = Post::count('id');
        $usersCount = User::count('id');
        return view('admin.post_management',compact('posts','postsCount','usersCount'));
    }

    public function test(){
        return view('hello');
    }
}
