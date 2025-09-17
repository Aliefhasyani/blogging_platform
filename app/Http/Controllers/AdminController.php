<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $posts = Post::with('user')->paginate(10);
        $postsCount = Post::count('id');
        $usersCount = User::count('id');
        return view('admin.post_management',compact('posts','postsCount','usersCount'));
    }


    public function userManagement(){
        $users = User::with('post')->paginate(10);
        
        return view('admin.users_management',compact('users'));
    }

    public function create(){
        return view('admin.user_create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:admin,author',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('user.management');
    }

  

}
